const gulp    = require( 'gulp' )
const plumber = require( 'gulp-plumber' )
const sass    = require( 'gulp-sass' )
const prefix  = require( 'gulp-autoprefixer' )
const wpPot   = require( 'gulp-wp-pot' )
const sort    = require( 'gulp-sort' )
const zip     = require( 'gulp-zip' )
const pkg     = require("./package.json")

function css() {
  return gulp.src("./scss/**/*.scss")
    .pipe(plumber())
    .pipe(sass({outputStyle: "expanded", includePaths: ["scss"]}))
    .pipe(prefix(["last 30 versions", "> 1%", "ie 8", "ie 7"], {cascade: true}))
    .pipe(gulp.dest("./"))
}

function pot() {
  return gulp.src("./**/*.php")
    .pipe(plumber())
    .pipe(sort())
    .pipe(wpPot({
        domain:         pkg.name,
        package:        pkg.name,
        bugReport:      pkg.bugs.url,
        lastTranslator: pkg.author,
        team:           pkg.author
    }))
    .pipe(gulp.dest(`./languages/${pkg.name}.pot`))
}

function dist() {
  return gulp.src([
    "./**/*.*",
    "!./.git",
    "!./.gitignore",
    "!./releases/**/*.*",
    "!./gulpfile.js",
    "!./node_modules/**/*.*",
    "!./package-lock.json",
    "!./package.json",    
    "!./scss/**/*.*",
  ], {
    base: ".."
  }).pipe(zip(`${pkg.name}_${pkg.version}.zip`))
    .pipe(gulp.dest("./releases"))
}

function watch(done) {
  gulp.watch("scss/**/*.scss", {cwd: "./", usePolling: true}, css)
  gulp.watch("**/*.php",       {cwd: "./", usePolling: true}, pot)

  return done()
}

module.exports.css   = css
module.exports.pot   = pot
module.exports.dist  = dist
module.exports.watch = watch

module.exports.default = gulp.series(pot, css, watch)