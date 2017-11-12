module.exports = function (grunt) {
    // Project configuration.
    grunt.initConfig({
        modx: grunt.file.readJSON('_build/config.json'),
        sshconfig: grunt.file.readJSON('/Users/jako/Documents/MODx/partout.json'),
        banner: '/*!\n' +
        ' * <%= modx.name %> - <%= modx.description %>\n' +
        ' * Version: <%= modx.version %>\n' +
        ' * Build date: <%= grunt.template.today("yyyy-mm-dd") %>\n' +
        ' */\n',
        bowercopy: {
            options: {
                clean: false,
                report: false
            },
            vendor: {
                options: {
                    destPrefix: 'source/js/mgr/vendor'
                },
                files: {
                    'Sortable.js': 'Sortable/Sortable.js'
                }
            }
        },
        usebanner: {
            css: {
                options: {
                    position: 'top',
                    banner: '<%= banner %>'
                },
                files: {
                    src: [
                        'assets/components/superboxselect/css/mgr/superboxselect.min.css'
                    ]
                }
            },
            js: {
                options: {
                    position: 'top',
                    banner: '<%= banner %>'
                },
                files: {
                    src: [
                        'assets/components/superboxselect/js/mgr/superboxselect.min.js',
                        'assets/components/superboxselect/js/types/resources/superboxselect.panel.inputoptions.min.js',
                        'assets/components/superboxselect/js/types/users/superboxselect.panel.inputoptions.min.js'
                    ]
                }
            }
        },
        uglify: {
            mgr: {
                src: [
                    'source/js/mgr/vendor/Sortable.js',
                    'source/js/mgr/superboxselect.js',
                    'source/js/mgr/superboxselect.panel.inputoptions.js',
                    'source/js/mgr/superboxselect.combo.templatevar.js',
                    'source/js/mgr/superboxselect.renderer.js'
                ],
                dest: 'assets/components/superboxselect/js/mgr/superboxselect.min.js'
            },
            resources: {
                src: [
                    'source/js/types/resources/superboxselect.panel.inputoptions.js'
                ],
                dest: 'assets/components/superboxselect/js/types/resources/superboxselect.panel.inputoptions.min.js'
            },
            users: {
                src: [
                    'source/js/types/users/superboxselect.panel.inputoptions.js'
                ],
                dest: 'assets/components/superboxselect/js/types/users/superboxselect.panel.inputoptions.min.js'
            }
        },
        sass: {
            options: {
                outputStyle: 'expanded',
                sourcemap: false
            },
            dist: {
                files: {
                    'source/css/mgr/superboxselect.css': 'source/sass/mgr/superboxselect.scss'
                }
            }
        },
        postcss: {
            options: {
                processors: [
                    require('pixrem')(),
                    require('autoprefixer')({
                        browsers: 'last 2 versions, ie >= 8'
                    })
                ]
            },
            dist: {
                src: [
                    'source/css/mgr/superboxselect.css'
                ]
            }
        },
        cssmin: {
            superboxselect: {
                src: [
                    'source/css/mgr/superboxselect.css'
                ],
                dest: 'assets/components/superboxselect/css/mgr/superboxselect.min.css'
            }
        },
        sftp: {
            css: {
                files: {
                    "./": [
                        'assets/components/superboxselect/css/mgr/superboxselect.min.css'
                    ]
                },
                options: {
                    path: '<%= sshconfig.hostpath %>develop/superboxselect/',
                    srcBasePath: 'develop/superboxselect/',
                    host: '<%= sshconfig.host %>',
                    username: '<%= sshconfig.username %>',
                    privateKey: '<%= sshconfig.privateKey %>',
                    passphrase: '<%= sshconfig.passphrase %>',
                    showProgress: true
                }
            },
            js: {
                files: {
                    "./": [
                        'assets/components/superboxselect/js/mgr/superboxselect.min.js'
                    ]
                },
                options: {
                    path: '<%= sshconfig.hostpath %>develop/superboxselect/',
                    srcBasePath: 'develop/superboxselect/',
                    host: '<%= sshconfig.host %>',
                    username: '<%= sshconfig.username %>',
                    privateKey: '<%= sshconfig.privateKey %>',
                    passphrase: '<%= sshconfig.passphrase %>',
                    showProgress: true
                }
            }
        },
        watch: {
            js: {
                files: [
                    'source/**/*.js'
                ],
                tasks: ['uglify', 'usebanner:js', 'sftp:js']
            },
            css: {
                files: [
                    'source/**/*.scss'
                ],
                tasks: ['sass', 'cssmin', 'usebanner:css', 'sftp:css']
            },
            config: {
                files: [
                    '_build/config.json'
                ],
                tasks: ['default']
            }
        },
        bump: {
            copyright: {
                files: [{
                    src: 'core/components/superboxselect/model/superboxselect/superboxselect.class.php',
                    dest: 'core/components/superboxselect/model/superboxselect/superboxselect.class.php'
                }],
                options: {
                    replacements: [{
                        pattern: /Copyright 2016(-\d{4})? by/g,
                        replacement: 'Copyright ' + (new Date().getFullYear() > 2016 ? '2016-' : '') + new Date().getFullYear() + ' by'
                    }]
                }
            },
            version: {
                files: [{
                    src: 'core/components/superboxselect/model/superboxselect/superboxselect.class.php',
                    dest: 'core/components/superboxselect/model/superboxselect/superboxselect.class.php'
                }],
                options: {
                    replacements: [{
                        pattern: /version = '\d+.\d+.\d+[-a-z0-9]*'/ig,
                        replacement: 'version = \'' + '<%= modx.version %>' + '\''
                    }]
                }
            }
        }
    });

    //load the packages
    grunt.loadNpmTasks('grunt-bowercopy');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-banner');
    grunt.loadNpmTasks('grunt-ssh');
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-postcss');
    grunt.loadNpmTasks('grunt-string-replace');
    grunt.renameTask('string-replace', 'bump');

    //register the task
    grunt.registerTask('default', ['bump', 'bowercopy', 'uglify', 'sass', 'postcss', 'cssmin', 'usebanner', 'sftp']);
};
