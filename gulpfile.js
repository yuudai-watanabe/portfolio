// gulpプラグインの読み込み
import gulp from 'gulp'; // gulp
import plumber from 'gulp-plumber'; // エラー時にWatch を停止させずに自動コンパイルを継続
import notify from 'gulp-notify'; // エラーメッセージを表示
import browser from 'browser-sync'; // 自動ブラウザリロードプラグイン読み込み
import changed from 'gulp-changed'; // 変更されたファイルだけを処理
import sassGlob from 'gulp-sass-glob'; // import文を短くまとめる
import autoprefixer from 'gulp-autoprefixer'; // CSSのベンダープレフィックス付与自動化
import imagemin, {gifsicle, mozjpeg, svgo} from 'gulp-imagemin'; // 画像圧縮
import imageminPngquant from 'imagemin-pngquant';
import csscomb from 'gulp-csscomb'; //CSSプロパティ記述整形
import connect from 'gulp-connect-php'; //PHPを使えるようにする
import rename from 'gulp-rename';
import iconfont from 'gulp-iconfont'; //iconfont用
import consolidate from 'gulp-consolidate';
import dartSass from 'sass';
import gulpSass from 'gulp-sass';
const sass = gulpSass( dartSass ); // sassコンパイル
  
gulp.task('connect-sync', function(done) {
  connect.server({
    port:80,
    base:'./'
  }, function (){
    browser({
      proxy: 'http://yuudaiweb.local/'
      // proxy: 'http://name.local/'
    });
  });
  done();
});

gulp.task('reload', function(done) {
  browser.reload();
  done();
});

gulp.task('sass', function(done) {
    gulp.src('develop/scss/**/*.scss')
        .pipe(plumber({errorHandler: notify.onError('Error: <%= error.message %>')}))
        .pipe(sassGlob())
        .pipe(sass().on('error', sass.logError))
        .pipe(sass())
        .pipe(csscomb())
        .pipe(autoprefixer('last 2 version'))
        .pipe(gulp.dest('./css'))
      .pipe(browser.reload({ stream: true }))
      done();
});

gulp.task('img', function (done) {
  gulp.src('develop/image/*')
    .pipe(plumber({errorHandler: notify.onError('Error: <%= error.message %>')}))
    .pipe(changed('image/'))
    .pipe(imagemin([
      gifsicle({ interlaced: true }),
      mozjpeg({ quality: 85, progressive: true }),
      imageminPngquant({
        quality: [.65, .80],
        speed: 1,
      }),
      svgo({
        plugins: [
          {
            name: 'removeViewBox',
            active: true
          },
          {
            name: 'cleanupIDs',
            active: false
          }
        ]
      })
    ]))
    .pipe(gulp.dest('./image/'));
    done();
});


let runTimestamp = Math.round(Date.now() / 1000);
let fontName = 'iconfont';

// アイコンフォント
gulp.task('iconfonts', function (done) {
  gulp.src(['develop/icons/svg/*.svg'])
    .pipe(iconfont({
      fontName: fontName, // required
      timestamp: runTimestamp,
      formats: ['ttf', 'eot', 'woff', 'svg']
    }))
    .on('glyphs', function (glyphs, options) {
      engine = 'lodash',
        consolidateOptions = {
          glyphs: glyphs,
          fontName: fontName,
          fontPath: '../fonts/', // cssからのフォントパスを指定 ※cssからの相対パスでフォントを指定してもOK
          className: 'c-icon', // cssのフォントのクラス名を指定
        }
      // アイコンフォント用のscssを作成(実装用)
      gulp.src('develop/icons/templates/icon.scss')
        .pipe(consolidate(engine, consolidateOptions))
        .pipe(rename({ basename: '_icon' }))
        .pipe(gulp.dest('develop/scss/foundation/variable/')); // scssの吐き出し先を指定
      gulp.src('develop/icons/templates/iconfont.scss')
        .pipe(consolidate(engine, consolidateOptions))
        .pipe(rename({ basename: '_icon' }))
        .pipe(gulp.dest('develop/scss/object/component/')); // scssの吐き出し先を指定
      // アイコンフォント用のcssを作成(プレビュー用)
      gulp.src('develop/icons/templates/iconfont.css')
        .pipe(consolidate(engine, consolidateOptions))
        .pipe(rename({ basename: 'sample' }))
        .pipe(gulp.dest('develop/icons/')); // scssの吐き出し先を指定
      // アイコンフォント一覧のサンプルHTMLを作成(プレビュー用)
      gulp.src('develop/icons/templates/iconfont.html')
        .pipe(consolidate(engine, consolidateOptions))
        .pipe(rename({ basename: 'sample' }))
        .pipe(gulp.dest('develop/icons/')); // サンプルhtmlの吐き出し先を指定
    })
    .pipe(gulp.dest('fonts/'));
    done();
});

// 監視ファイル
gulp.task('watch-files', function(done) {
  gulp.watch('develop/scss/**/*.scss', gulp.task('sass'));
  gulp.watch('develop/image/**', gulp.task('img'));
  gulp.watch('develop/icons/svg/*.svg', gulp.task('iconfonts'));
  gulp.watch('./*.php', gulp.task('reload'));
  done();
});

// タスクの実行
gulp.task('default', gulp.series('connect-sync', 'watch-files', function(done) {
  done();
}));