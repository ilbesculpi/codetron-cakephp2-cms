var pluginPath = './output/Plugin/Cms';
var recipePath = __base + '/recipes/cakephp2-cms';
var assetsPath = recipePath + '/assets';
var templatesPath = recipePath + '/templates';

var fs = require('fs-extra');
var async = require('async');
var inflect = require('inflect');
var burner = require(__base + '/burner');
var auth = require(recipePath + '/auth');
var assets = require(recipePath + '/assets');
var crud = require(recipePath + '/crud');

module.exports = {
    
    cook: function(config, json, callback) {
        
        console.info('[INFO] cakephp2-cms()');
        
        async.series([
            function(callback) {
                console.log('[DEBUG] initializing Cms Plugin...');
                init(config, json, callback);
            },
            function(callback) {
                console.log('[DEBUG] generating main templates...');
                cookAppTemplates(json, callback);
            },
            function(callback) {
                console.log('[DEBUG] generating auth templates...');
                auth.cook(config, json, callback);
            },
            function(callback) {
                console.log('[DEBUG] generating crud templates...');
                crud.cook(config, json, callback);
            },
            function(callback) {
                console.log('[DEBUG] copying assets...');
                assets.cook(config, json, callback);
            },
            function(callback) {
                console.log('[DEBUG] installing dependencies...');
                assets.install(callback);
            }
        ], function(error, results) {
            callback(error);
        });
        
    }
    
};

var init = function(config, json, callback) {
    async.series([
        function(callback) {
            fs.emptyDir(pluginPath, callback);
        },
        function(callback) {
            burner.mkdirs([
                pluginPath,
                pluginPath + '/Config',
                pluginPath + '/Controller',
                pluginPath + '/Model',
                pluginPath + '/View',
                pluginPath + '/View/Auth',
                pluginPath + '/View/Elements',
                pluginPath + '/View/Helper',
                pluginPath + '/View/Layouts',
                pluginPath + '/webroot'
            ], callback);
        }
    ], function(error, results) {
        callback(error);
    });
};

var cookAppTemplates = function(json, callback) {
    async.parallel([
        function(callback) {
            var source = templatesPath + '/controllers/app_controller.php';
            var dest = pluginPath + '/Controller/CmsAppController.php';
            var params = {};
            burner.template(source, dest, params, callback);
        },
        function(callback) {
            var source = templatesPath + '/models/app_model.php';
            var dest = pluginPath + '/Model/CmsAppModel.php';
            var params = {};
            burner.template(source, dest, params, callback);
        },
        function(callback) {
            var source = templatesPath + '/controllers/dashboard_controller.php';
            var dest = pluginPath + '/Controller/DashboardController.php';
            var params = {};
            burner.template(source, dest, params, callback);
        },
        function(callback) {
            var source = templatesPath + '/config/routes.php';
            var dest = pluginPath + '/Config/routes.php';
            var params = {};
            burner.template(source, dest, params, callback);
        },
        function(callback) {
            var source = templatesPath + '/views/elements';
            var dest = pluginPath + '/View/Elements';
            fs.copy(source, dest, callback);
        },
        function(callback) {
            var source = templatesPath + '/views/layouts';
            var dest = pluginPath + '/View/Layouts';
            fs.copy(source, dest, callback);
        },
        function(callback) {
            var source = templatesPath + '/views/helpers/theme_helper.php';
            var dest = pluginPath + '/View/Helper/ThemeHelper.php';
            fs.copy(source, dest, callback);
        },
        function(callback) {
            var source = templatesPath + '/views/dashboard/home.ctp';
            var dest = pluginPath + '/View/Dashboard/home.ctp';
            fs.copy(source, dest, callback);
        }
    ], function(error, results) {
        callback(error);
    });
};
