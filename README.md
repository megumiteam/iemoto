# Iemoto

これは、WordPressテーマ用の [grunt-init](http://gruntjs.com/project-scaffolding) テンプレートです。

Grunt を使うとWordPressテーマを開発する上で必要な様々なプロセスを自動化することができます。

[underscores]: https://github.com/automattic/_s
[grunt-init]: http://gruntjs.com/project-scaffolding

## Installation
もし、[grunt-init][] をインストールしてなければ先にインストールしてください。

```
sudo npm install -g grunt-init
```

[grunt-init][] のインストールが完了したら、`~/.grunt-init/` ディレクトリを作成してください。

```
mkdir ~/.grunt-init
```

次は、以下のコマンドを実行して、このテンプレートをインストールしてください。

```
git clone git@github.com:megumiteam/iemoto.git
```

httpsを使うなら以下のような感じで。

```
git clone https://github.com/megumiteam/iemoto.git
```

インストールは以上で完了です。

テンプレートを最新版に更新するには以下のコマンドを実行しましょう。

```
cd ~/.grunt-init/iemoto
git pull
```

## 使い方

`wp-content/themes` ディレクトリに移動して任意のディレクトリを作成し、以下のコマンドを実行してください。

```
grunt-init iemoto
```

以上を実行すると、テーマ名などの入力を求められた後、テーマファイルが作成されます。

テーマファイルの作成が完了したら、以下のコマンドを実行してください。これによりCompassなどのツールのセットアップが完了します。

```
npm install
```

あとは、`sass/your-theme-name.scss` や `js/your-theme-name.js` などを編集して、必要に応じて以下のコマンドを実行して、.scss などのコンパイルを実行してください。

```
grunt
```

以降は、`grunt` と実行するだけで、.scss のコンパイルや、JavaScriptのminifyを行います。

また、これらのファイルは、WordPressによってあらかじめロードされています。

## Compassをさらに使いこなす！

### Foundationを使う

[Foundation](http://foundation.zurb.com/)をインストール

```
sudo gem install zurb-foundation
```

テーマディレクトリ内のGruntfile.jsの69行目に以下のように記述

```
        compass: {
            dist: {
                options: {
                    require: 'zurb-foundation', // この行を追加
                    sassDir: 'sass',
                    cssDir: 'css',
```

あとは .scss を編集して `grunt` コマンドを実行！

### Susyを使う

[Susy](http://susy.oddbird.net/)をインストール

```
sudo gem install susy
```

テーマディレクトリ内のGruntfile.jsの69行目に以下のように記述

```
        compass: {
            dist: {
                options: {
                    require: 'susy', // この行を追加
                    sassDir: 'sass',
                    cssDir: 'css',
```

あとは .scss を編集して `grunt` コマンドを実行！

## Notes

 * Compassの設定ファイル config.rb は不要です。
 * Underscoresに対して、フックの追加、CSSの削除等の修正を加えてあります。

## Contributors

* [miya0001](https://github.com/miya0001)
* [gatespace](https://github.com/gatespace)
* [megumiteam](https://github.com/megumiteam)
