const mix = require("laravel-mix");

mix
  .sass("resources/sass/app.scss", "public/css")
  .js("resources/js/app.js", "public/js")
  .js("resources/cupload/js/cupload.js", "public/js")
  .sass("resources/sass/index.scss", "public/css")
  .sass("resources/sass/Individual.scss", "public/css")
  .sass("resources/sass/login.scss", "public/css")
  .sass("resources/sass/message.scss", "public/css")
  .sass("resources/sass/new.scss", "public/css")
  .sass("resources/sass/person.scss", "public/css")
  .sass("resources/sass/header.scss", "public/css")
  .sass("resources/sass/footer.scss", "public/css")
  .version()
  .copyDirectory("resources/editor/js", "public/js")
  .copyDirectory("resources/editor/css", "public/css")
  .copyDirectory("resources/beagle", "public/beagle");
