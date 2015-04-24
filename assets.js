var pluginPath = './output/Plugin/Cms';
var recipePath = __base + '/recipes/cakephp2-cms';
var assetsPath = recipePath + '/assets';
var templatesPath = recipePath + '/templates';

var fs = require('fs-extra');
var async = require('async');
var bower = require('bower');
var burner = require(__base + '/burner');

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
            .install([], {}, { cwd: pluginPath })
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
            var source = assetsPath + '/bower.json';
            var dest = pluginPath + '/bower.json';
            fs.copy(source, dest, callback);
        },
        function(callback) {
            var source = assetsPath + '/bowerrc';
            var dest = pluginPath + '/.bowerrc';
            fs.copy(source, dest, callback);
        },
        function(callback) {
            var source = assetsPath + '/webroot';
            var dest = pluginPath + '/webroot';
            fs.copy(source, dest, callback);
        }
    ], function(error, results) {
        callback(error);
    });
};
