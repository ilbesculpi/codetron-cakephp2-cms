
var RECIPE_PATH = RECIPES_PATH + '/cakephp2-cms';
var TEMPLATES_PATH = RECIPE_PATH + '/templates/auth';
var ASSETS_PATH = RECIPE_PATH + '/assets';
var CMS_PATH = OUTPUT_PATH + '/Plugin/Cms';

var fs = require('fs-extra');
var async = require('async');
var burner = require(BASE_PATH + '/burner');

var auth = {
    
    cook: function(config, json, callback) {
        
        this.config = config;
        this.json = json;
        
        async.parallel([
            function(callback) {
                cookControllers(json, callback);
            },
            function(callback) {
                cookModels(json, callback);
            },
            function(callback) {
                cookViews(json, callback);
            },
            function(callback) {
                cookAssets(json, callback);
            }
        ], function(error, results) {
            callback(error);
        });
    }
    
};

module.exports = auth;

var cookControllers = function(json, callback) {
    var source = TEMPLATES_PATH + '/controller.php';
    var dest = CMS_PATH + '/Controller/AuthController.php';
    var params = {};
    burner.template(source, dest, params, callback);
};

var cookModels = function(json, callback) {
    var source = TEMPLATES_PATH + '/model.php';
    var dest = CMS_PATH + '/Model/Admin.php';
    var params = {};
    burner.template(source, dest, params, callback);
};

var cookViews = function(json, callback) {
    var views = ['forgot_password', 'login', 'profile', 'register', 'reset_password', 'welcome'];
    async.each(views, cookAuthView, callback);
};

var cookAuthView = function(viewName, callback) {
    var source = TEMPLATES_PATH + '/views/' + viewName + '.ctp';
    var dest = CMS_PATH + '/View/Auth/' + viewName + '.ctp';
    var viewVars = {
        CMS: auth.config.appName || "CMS"
    };
    burner.template(source, dest, viewVars, callback);
};

var cookAssets = function(json, callback) {
    var source = ASSETS_PATH + '/schema.sql';
    var dest = OUTPUT_PATH + '/scripts/auth.sql';
    fs.copy(source, dest, callback);
};
