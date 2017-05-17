const gulp = require('gulp')
const wpPot = require('gulp-wp-pot')
const sort = require('gulp-sort')

gulp.task('pot', () => {
  return gulp.src('./**/*.php')
    .pipe(sort())
    .pipe(wpPot( {
      domain: 'herschel',
      package: 'herschel',
      bugReport: 'https://github.com/kniffen/Herschel/issues',
      lastTranslator: 'Kniffen <knifftech@gmail.com>',
      team: 'Kniffen <knifftech@gmail.com>'
    } ))
    .pipe(gulp.dest('./languages/herschel.pot'))
    .on('end', () => gulp.run('local-deploy'))
})