# Iemoto

これは、WordPressテーマ用の [grunt-init](http://gruntjs.com/project-scaffolding) テンプレートです。

Grunt を使うとWordPressテーマを開発する上で必要な様々なプロセスを自動化することができます。

[underscores]: https://github.com/automattic/_s
[grunt-init]: http://gruntjs.com/project-scaffolding

## インストール

### grunt-init をインストール

まずはじめに `grunt-init` をインストールしてください。

```
sudo npm install -g grunt-init
```

次に、`~/.grunt-init` ディレクトリを作成してください。

```
mkdir ~/.grunt-init
```

ここまでの作業は、他の `grunt-init` テンプレートを使ったことがあれば不要です。

### Iemoto をインストール

次にこのテンプレートを git から取得して下さい。

```
git clone git@github.com:megumiteam/iemoto.git ~/.grunt-init/iemoto
```

https を使う場合は以下のとおり。

```
git clone https://github.com/megumiteam/iemoto.git ~/.grunt-init/iemoto
```

### sass (Ccompass) について

style.css および editor-style.css の作成に Sass および Compass を利用していますので、事前にインストールしておいてください。

* Sass: http://sass-lang.com/
* Compass: http://compass-style.org/

### gulp について

js や sass (Compass) のコンパイルなどに [gulp.js](http://gulpjs.com/) を利用することも出来ます。 
この場合、事前に `$ npm install --global gulp` でインストールしておいてください。

* gulp.js: http://gulpjs.com/

## 使い方

`wp-content/themes` ディレクトリ以下に、任意の名前のテーマ用ディレクトリを作成してください。

```
mkdir wp-content/themes/my-theme
```

ディレクトリを作成後そのディレクトリに移動し、次に以下のコマンドを実行して、テーマのベースとなる各種のファイルを作ります。

```
grunt-init iemoto
```

このコマンドを実行すると、テーマ名やDescription、ライセンスなど、いくつかの情報の入力を求められます。

```
[miyauchi@localhost iemoto]$ grunt-init iemoto
Running "init:iemoto" (init) task
This task will create one or more files in the current directory, based on the
environment and the answers to a few questions. Note that answering "?" to any
question will show question-specific help and answering "none" to most questions
will leave its value blank.

Please answer the following:
[?] Project title (Iemoto) 
[?] PHP function prefix (alpha and underscore characters only) (iemoto) 
[?] Description (This is a awesome cool plugin.) 
[?] Project homepage (https://digitalcube.jp/) 
[?] Author name (Digitalcube Co,.Ltd) 
[?] Author url (https://digitalcube.jp/) 
[?] Use gulp? (y/N) 
[?] Do you need to make any changes to the above before continuing? (y/N)
```

最後に、変更はありませんか？と尋ねられるので、`N` と入力するか、そのままエンターキーを押すとテーマのテンプレートが作成されます。

`[?] Use gulp? (y/N) ` で `y` にすると gulp の実行に必要なファイルが作成されます（デフォルトは `N` です）。

次に以下のコマンドを実行して `grunt` （あるいは `gulp` ）の実行に必要な Grunt プラグインをダウンロードしてください。

```
npm install
```

ここで、インストールされる Grunt (gulp) プラグインは `package.json` 内で定義されています。

以上が完了すると、ディレクトリ内に以下のようにテーマ用のファイルが生成されていることを確認できると思います。

```
├── _sass
│   ├── _variables.scss
│   ├── editor-style.scss
│   ├── style.scss
│   ├── common
│   │   ├── _accessibility.scss
│   │   ├── _alignments.scss
│   │   ├── _clearings.scss
│   │   ├── _elements.scss
│   │   ├── _forms.scss
│   │   ├── _infinitescroll.scss
│   │   ├── _reset.scss
│   │   └── _typography.scss
│   ├── content
│   │   ├── _aside.scss
│   │   ├── _comment.scss
│   │   └── _content.scss
│   ├── functions
│   │   └── _functions.scss
│   ├── header_footer
│   │   ├── _footer.scss
│   │   └── _header.scss
│   ├── layout
│   │   ├── _layout.scss
│   │   └── _media-queries.scss
│   ├── media
│   │   ├── _captions.scss
│   │   ├── _galleries.scss
│   │   └── _media.scss
│   ├── navigation
│   │   ├── _link.scss
│   │   ├── _main-navigation.scss
│   │   └── _paging.scss
│   └── widgets
│        └── _widgets.scss
├── 404.php
├── archive.php
├── comments.php
├── content-none.php
├── content-page.php
├── content-single.php
├── content.php
├── footer.php
├── functions.php
├── Gruntfile.js (あるいは gulpfile.js )
├── header.php
├── inc
│   ├── custom-header.php
│   ├── customizer.php
│   ├── extras.php
│   ├── jetpack.php
│   └── template-tags.php
├── index.php
├── js
│   ├── customizer.js
│   ├── iemoto.js
│   ├── navigation.js
│   └── skip-link-focus-fix.js
├── languages
│   ├── _s.pot
│   ├── ja.mo
│   ├── ja.po
│   └── readme.txt
├── node_modules
├── package.json
├── page.php
├── README.md
├── rtl.css
├── screenshot.png
├── search.php
├── sidebar.php
├── single.php
└── style.css
```

以上でテーマの開発に必要な環境が整いました。

## デフォルト値について

`grunt-init` 実行時に表示される各種プロンプトにはデフォルト値を設定することができます。

名前やURL等は、あらかじめデフォルト値を設定してくとさらに便利になります。

デフォルト値を設定するには以下のように、`defaults.json` を設置し、そのファイルを編集してください。

```
cp ~/.grunt-init/iemoto/defaults.json.sample ~/.grunt-init/defaults.json
```

## grunt での CSS や JavaScript ファイルの minify について

`.js` や `.scss` などのファイルを修正したら、以下のコマンドを実行して下さい。 

```
grunt
```

## gulp での CSS や JavaScript ファイルの minify について

`.js` や `.scss` などのファイルを修正したら、以下のコマンドを実行して下さい。 

```
gulp
```

JavaScript のみの場合は `gulp js` 、Sass(Compass) のみの場合は `gulp compass` も利用できます。

## watch について

`grunt watch` あるいは `gulp watch` を使えば、ファイルの更新を grunt(gulp) が監視し、自動的に Sass(Compass) のコンパイル、minify の作業を行います。

```
grunt watch
あるいは
gulp watch
```

watch を終了するには、キーボードで `[control]+[c]` を押して下さい。

## バージョン番号について

実行時に `.js`、`style.css` に自動でバージョン番号を付与します。

バージョン番号を変更する場合は `package.json` ファイルの

```
"version": "0.1.0",
```

を変更してください。

`functions.php` の `wp_enqueue_style()` や `wp_enqueue_script()` ではバージョン引数に `style.css` に記載されてるバージョン番号を利用します。

### Debug モードと Sourcemap

WordPress をデバッグモードにしていると、テーマは `css/style.css` を読み込みます。

`grunt` または `gulp` で Sass(Compass) をコンパイルすると `css/style.css` に対して Sourcemap を作成しますので css のデバッグに便利です。

Sourcemap の作成には Sass 3.3.0 以上が必要です。

## 公式ディレクトリ等へ登録する際の注意

* 以下のファイルは公式ディレクトリに登録する際には、svn:ignore しておきましょう。
 * node_modules

## フィードバック

皆様からのフィードバックをお待ちしています。

* https://github.com/megumiteam/iemoto/issues

## Contributors

* [miya0001](https://github.com/miya0001)
* [gatespace](https://github.com/gatespace)
* [8bitodyssey](https://github.com/8bitodyssey)

