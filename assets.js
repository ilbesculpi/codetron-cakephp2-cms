
var RECIPE_PATH = RECIPES_PATH + '/cakephp2-cms';
var TEMPLATES_PATH = RECIPE_PATH + '/templates';
var ASSETS_PATH = RECIPE_PATH + '/assets';
var CMS_PATH = OUTPUT_PATH + '/Plugin/Cms';

var fs = require('fs-extra');
var async = require('async');
var bower = require('bower');
var burner = require(BASE_PATH + '/burner');

var assets = {
    
    cook: function(config, json, callback) {
        this.config = config;
        this.json = json;
        copyAssets(json, callback);
    },
    
    install: function(callback) {
        
        // try to install dependencies using bower
        // { cwd: tempDir.path }
        bower.commands
            .install([], {}, { cwd: CMS_PATH })
            .on('end', function(installed) {
                callback();
            })
            .on('error', function(error) {
                callback(error);
            });
        
    }
    
};

module.exports = assets;

var copyAssets = function(json, callback) {
    async.series([
        function(callback) {
            var source = ASSETS_PATH + '/bower.json';
            var dest = CMS_PATH + '/bower.json';
            fs.copy(source, dest, callback);
        },
        function(callback) {
            var source = ASSETS_PATH + '/bowerrc';
            var dest = CMS_PATH + '/.bowerrc';
            fs.copy(source, dest, callback);
        },
        function(callback) {
            var source = ASSETS_PATH + '/webroot';
            var dest = CMS_PATH + '/webroot';
            fs.copy(source, dest, callback);
        }
    ], function(error, results) {
        callback(error);
    });
};
