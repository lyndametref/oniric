# Oniric: Wordpress Theme
realised by Lynda Metref and based on Aaron John Schlosser's Blank Gulp/Jade/Compass/Sass Template WordPress Theme Using Bootstrap.

### Description

The bare essentials of a WordPress theme, no CSS styles added. Perfect for those who would like to build their own theme from scratch. One custom menu and one widgetized sidebar to get you started.  Template provides built-in support for building sites with Gulp, Pug and Sass. It also install required dependencies to use Bootstrap.

### Installation

Installation requires _npm_ and _bower_. If necessary, please install these (ideally, globally) first.

First (or then), install the back-end dependencies (gulp, etc.):

```bash
sudo npm install
```

Install the front-end dependencies:
```bash
bower install
```

Build the whole theme:
```bash
gulp full
```

Then copy or link `target/oniric` in your Wordpress theme folder.

You can then edit the styles in `src/scss` and the templates `src/templates` php files which are not to be process are in `src/php`.
