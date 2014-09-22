# Iemoto

This is a WordPress Starter Theme based on [_s](https://github.com/automattic/_s) and integrated with [grunt](http://gruntjs.com/project-scaffolding).

Iemoto follows all the fixes and feature upgrades of [_s](https://github.com/automattic/_s)

Automate theme development process with it!

## How to install

### install grunt-init

If you've never used any `grunt-init` templates follow below to install `grunt-init`.

```
sudo npm install -g grunt-init
```

Next, create `~/.grunt-init` directory.

```
mkdir ~/.grunt-init
```

### Install Iemoto

Get this templates via git.

```
git clone git@github.com:megumiteam/iemoto.git ~/.grunt-init/iemoto
```

Or if you prefer https, try this.

```
git clone https://github.com/megumiteam/iemoto.git ~/.grunt-init/iemoto
```

### Sass(Compass)

Iemoto utilizes Sass and Compass to create style.css and editor-style.css.
Get them first.

* Sass: http://sass-lang.com/
* Compass: http://compass-style.org/

### gulp

You can also use [gulp.js](http://gulpjs.com/) for js/sass compiling if installed.

```
$ npm install --global gulp
```

* gulp.js: http://gulpjs.com/

## Usage

Create your theme directory in `wp-content/themes`.

```
mkdir wp-content/themes/my-theme
```

Cd to your theme directory run `grunt-init iemoto` to create theme files.

```
grunt-init iemoto
```

By commanding above, you will be asked for some inputs such as Theme Name, Description, license and so on.

```
$ grunt-init iemoto
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

In the end of this procedure, you will be asked if there's any changes. Type `N` or enter key to create the templates.

When asked `[?] Use gulp? (y/N) `, type `y` to create files you need for gulp. It's `N` by default.

Then, command `npm install` to download files needed for `grunt` (or `gulp`) command.

```
npm install
```

Files to be installed are defined in `package.json` file.

Once you are done to this point, you can see all the files created as below.

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
├── Gruntfile.js (or gulpfile.js )
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

Create you own theme now.

## Default values

You can set default values to the `grunt-init` prompt.

It will be more usefull if name and URL.

To set default values, put defaults.json and edit it.

```
cp ~/.grunt-init/iemoto/defaults.json.sample ~/.grunt-init/defaults.json
```

## Minifying css and javascripts with grunt

When you've edited `.js` and `.scss`, command this. 

```
grunt
```

## Minifying css and javascripts with gulp

When you've edited `.js` and `.scss`, command this. 

```
gulp
```

You can `gulp js` or `gulp compass` to specify just js or Sass(Compass).

## watch

If you utilize `grunt watch` or `gulp watch`, grunt(gulp) will watch the file editing and automatically minify them.


```
grunt watch
// or
gulp watch
```

To stop watch, type `[control]+[c]`

## Version of javascripts and styles

Iemoto adds versions to js and css which is specified in package.json as

```
"version": "0.1.0",
```

When grunt(gulp)ed, the version specified in package.json will be implemented in style.css and .js as comments, and also will be passed to `wp_enqueue_style()` and `wp_enqueue_script()`.

### Debug mode and Sourcemap

If WP_DEBUG is true, theme will load `css/style.css`, which has Sourcemap integrated, instead of `style.css`, which is the Sourcemap-ommited version of the `css/style.css`.

Sourcemap is available if your Sass version is greater than 3.3.0.


## Note when you share your theme on WordPress.org directory

svn:ignore `node_modules` directory

## Feedbacks

Feedbacks are very much welcome!

* https://github.com/megumiteam/iemoto/issues

## Contributors

* [miya0001](https://github.com/miya0001)
* [gatespace](https://github.com/gatespace)
* [8bitodyssey](https://github.com/8bitodyssey)

