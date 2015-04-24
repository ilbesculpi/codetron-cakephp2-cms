var recipePath = __base + '/recipes/cakephp2-cms';
var pluginPath = './output/Plugin/Cms';
var assetsPath = recipePath + '/assets';
var templatesPath = recipePath + '/templates/auth';

var fs = require('fs-extra');
var async = require('async');
var burner = require(__base + '/burner');

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
    var source = templatesPath + '/controller.php';
    var dest = pluginPath + '/Controller/AuthController.php';
    var params = {};
    burner.template(source, dest, params, callback);
};

var cookModels = function(json, callback) {
    var source = templatesPath + '/model.php';
    var dest = pluginPath + '/Model/Admin.php';
    var params = {};
    burner.template(source, dest, params, callback);
};

var cookViews = function(json, callback) {
    var views = ['forgot_password', 'login', 'profile', 'register', 'reset_password', 'welcome'];
    async.each(views, cookAuthView, callback);
};

var cookAuthView = function(viewName, callback) {
    var source = templatesPath + '/views/' + viewName + '.ctp';
    var dest = pluginPath + '/View/Auth/' + viewName + '.ctp';
    var viewVars = {
        CMS: auth.config.appName || "CMS"
    };
    burner.template(source, dest, viewVars, callback);
};

var cookAssets = function(json, callback) {
    var source = assetsPath + '/schema.sql';
    var dest = './output/scripts/auth.sql';
    fs.copy(source, dest, callback);
};
