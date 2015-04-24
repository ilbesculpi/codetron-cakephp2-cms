var pluginPath = './output/Plugin/Cms';
var recipePath = __base + '/recipes/cakephp2-cms';
var assetsPath = recipePath + '/assets';
var templatesPath = recipePath + '/templates';

var fs = require('fs-extra');
var async = require('async');
var inflect = require('inflect');
var burner = require(__base + '/burner');

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
    var source = templatesPath + '/controllers/crud_controller.php';
    var dest = pluginPath + '/Controller/' + params.Models + 'Controller.php';
    burner.template(source, dest, params, callback);
};

var cookCrudViews = function(config, callback) {
    
    var params = getControllerVars(config);
    
    fs.mkdir(pluginPath + '/View/' + params.Models, function(error) {
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
    var source = templatesPath + '/views/crud/' + view.view + '.ctp';
    var dest = pluginPath + '/View/' + params.Models + '/' + view.view + '.ctp';
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
