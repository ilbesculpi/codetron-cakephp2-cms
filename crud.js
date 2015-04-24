
var RECIPE_PATH = RECIPES_PATH + '/cakephp2-cms';
var TEMPLATES_PATH = RECIPE_PATH + '/templates';
var ASSETS_PATH = RECIPE_PATH + '/assets';
var CMS_PATH = OUTPUT_PATH + '/Plugin/Cms';

var fs = require('fs-extra');
var async = require('async');
var inflect = require('inflect');
var burner = require(BASE_PATH + '/burner');

var crud = {
    
    cook: function(config, json, callback) {
        
        this.config = config;
        
        this.json = json;
        
        async.series([
            function(callback) {
                async.eachSeries(json.models, cookCrudController, callback);
            },
            function(callback) {
                async.eachSeries(json.models, cookCrudViews, callback);
            }
        ], function(error, results) {
            callback(error);
        });
        
    }
    
};

module.exports = crud;


var cookCrudController = function(config, callback) {
    var params = getControllerVars(config);
    var source = TEMPLATES_PATH + '/controllers/crud_controller.php';
    var dest = CMS_PATH + '/Controller/' + params.Models + 'Controller.php';
    burner.template(source, dest, params, callback);
};

var cookCrudViews = function(config, callback) {
    
    var params = getControllerVars(config);
    
    fs.mkdir(CMS_PATH + '/View/' + params.Models, function(error) {
        if( error ) {
            callback(error);
        }
        else {
            var list = ['index', 'create', 'edit', 'form', 'view'];
            var views = [];
            list.forEach(function(view) {
                views.push({
                    view: view,
                    config: config
                });
            });
            async.each(views, cookView, callback);
        }
    });
    
};

var cookView = function(view, callback) {
    var params = getControllerVars(view.config);
    var source = TEMPLATES_PATH + '/views/crud/' + view.view + '.ctp';
    var dest = CMS_PATH + '/View/' + params.Models + '/' + view.view + '.ctp';
    burner.template(source, dest, params, callback);
};

var getControllerVars = function(config) {
    var model = config.name;
    return {
        name: model,
        Model: model,
        Models: inflect.pluralize(model),
        model: inflect.decapitalize(model),
        models: inflect.decapitalize(inflect.pluralize(model)),
        fields: config.fields
    };
};
