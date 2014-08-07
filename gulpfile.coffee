gulp = require 'gulp'
gutil = require 'gulp-util'
notify = require 'gulp-notify'
less = require 'gulp-less'
coffee = require 'gulp-coffee'
rename = require 'gulp-rename'
concat = require 'gulp-concat'
uglify = require 'gulp-uglify'
minify = require 'gulp-minify-css'

lessDir = 'assets/less'
cssTarget = 'public/css'

coffeeDir = 'assets/coffee'
jsTarget = 'public/js'

gulp.task 'less', ->
  gulp.src lessDir + '/application.less'
    .pipe less()
    .on 'error', gutil.log
    .on 'error', notify.onError()
    .pipe rename 'style.css'
    .pipe minify()
    .pipe gulp.dest cssTarget
    .pipe notify 'LESS compiled'

gulp.task 'coffee', ->
  gulp.src [
    coffeeDir + '/application.coffee'
  ]
    .pipe coffee()
    .pipe concat 'app.js'
    .pipe gulp.dest jsTarget
    .pipe notify 'CoffeeScript compiled'

gulp.task 'watch', ->
    gulp.watch lessDir + '/**/*.less', ['less']
    gulp.watch coffeeDir + '/**/*.coffee', ['coffee']

gulp.task 'default', ['less', 'coffee', 'watch']
