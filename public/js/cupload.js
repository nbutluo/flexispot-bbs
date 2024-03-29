/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/cupload/js/cupload.js":
/*!*****************************************!*\
  !*** ./resources/cupload/js/cupload.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

(function (window, document) {
  //定义上传类
  var Cupload = function Cupload(options) {
    //初始化 new对象
    if (!(this instanceof Cupload)) {
      return new Cupload(options);
    } //设置默认参数


    this.localValue = {
      ele: '#cupload',
      name: 'image',
      num: 1,
      width: 148,
      height: 148
    }; //参数覆盖

    this.opt = this.extend(this.localValue, options, true); //所需变量

    this.i = 0;
    this.imageArr = new Array(); //图片

    this.widthArr = new Array(); //图片宽度

    this.heightArr = new Array(); //图片高度

    this.imageBox = new Array(); //图片盒子

    this.imagePreview = new Array(); //图片预览

    this.imageInput = new Array(); //图片input

    this.imageDelete = new Array(); //图片删除遮罩

    this.deleteBtn = new Array(); //图片删除按钮

    this.sortLeftBtn = new Array(); //图片左排序按钮

    this.sortRightBtn = new Array(); //图片右排序按钮

    if (typeof options.ele === "string") {
      this.opt.ele = document.querySelector(options.ele);
    } else {
      this.opt.ele = options.ele;
    }

    this.initDom();
  };

  Cupload.prototype = {
    constructor: this,
    //初始化
    initDom: function initDom() {
      this.cteateImageList();
      this.createUploadBox();
      this.createOverlay();

      if (this.opt.data) {
        this.showImagePreview();
      }
    },
    //参数覆盖
    extend: function extend(o, n, override) {
      for (var key in n) {
        if (n.hasOwnProperty(key) && (!o.hasOwnProperty(key) || override)) {
          o[key] = n[key];
        }
      }

      return o;
    },
    //创建图片列表
    cteateImageList: function cteateImageList() {
      this.imageList = document.createElement('ul');
      this.imageList.className = 'cupload-image-list';
      this.imageList.style.margin = 0;
      this.imageList.style.padding = 0;
      this.imageList.style.display = 'inline-block';
      this.imageList.style.minHeight = this.opt.height;
      this.opt.ele.appendChild(this.imageList);

      this.imageList.ondragstart = function (event) {
        console.log('start');
      };
    },
    //创建上传框
    createUploadBox: function createUploadBox() {
      this.uploadBox = document.createElement('div');
      this.uploadBox.className = 'cupload-upload-box';
      this.uploadBox.style.position = 'relative';
      this.uploadBox.style.display = 'inline-block';
      this.uploadBox.style.textAlign = 'center';
      this.uploadBox.style.backgroundColor = '#fbfdff';
      this.uploadBox.style.border = '1px dashed #c0ccda';
      this.uploadBox.style.borderRadius = '6px';
      this.uploadBox.style.WebkitBoxSizing = 'border-box';
      this.uploadBox.style.boxSizing = 'border-box';
      this.uploadBox.style.width = this.opt.width + 'px';
      this.uploadBox.style.height = this.opt.height + 'px';
      this.uploadBox.style.lineHeight = this.opt.height + 'px';
      this.opt.ele.appendChild(this.uploadBox);
      this.createUploadBtn();
      this.createUploadInput();

      var _this = this;

      this.uploadBox.onmouseover = function () {
        _this.uploadBox.style.borderColor = '#409eff';
      };

      this.uploadBox.onmouseout = function () {
        _this.uploadBox.style.borderColor = '#c0ccda';
      };
    },
    //创建遮罩
    createOverlay: function createOverlay() {
      this.overlay = document.createElement('div');
      this.overlay.className = 'cupload-overlay';
      this.overlay.style.display = "none";
      this.overlay.style.position = "fixed";
      this.overlay.style.textAlign = "center";
      this.overlay.style.top = 0;
      this.overlay.style.right = 0;
      this.overlay.style.bottom = 0;
      this.overlay.style.left = 0;
      this.overlay.style.zIndex = 9115;
      this.overlay.style.backgroundColor = "rgba(0,0,0,.3)";
      this.opt.ele.appendChild(this.overlay);

      var _this = this;

      this.overlay.onclick = function () {
        _this.zoomOutImage();
      };
    },
    //创建上传按钮
    createUploadBtn: function createUploadBtn() {
      this.uploadBtn = document.createElement('span');
      this.uploadBtn.className = 'cupload-upload-btn';
      this.uploadBtn.style.position = 'absolute';
      this.uploadBtn.style.left = this.opt.width / 2 - 14 + 'px';
      this.uploadBtn.style.fontSize = '28px';
      this.uploadBtn.style.color = '#8c939d';
      this.uploadBtn.innerHTML = '+';
      this.uploadBox.appendChild(this.uploadBtn);
    },
    //创建上传input
    createUploadInput: function createUploadInput() {
      this.uploadInput = document.createElement('input');
      this.uploadInput.className = 'cupload-upload-input';
      this.uploadInput.style.position = 'absolute';
      this.uploadInput.style.top = 0;
      this.uploadInput.style.right = 0;
      this.uploadInput.style.width = '100%';
      this.uploadInput.style.height = '100%';
      this.uploadInput.style.opacity = 0;
      this.uploadInput.style.cursor = 'pointer';
      this.uploadInput.type = 'file';
      this.uploadInput.multiple = 'multiple';
      this.uploadInput.accept = 'image/*';
      this.uploadInput.title = '';
      this.uploadBox.appendChild(this.uploadInput);

      var _this = this;

      this.uploadInput.onchange = function () {
        _this.removeUploadBox();

        _this.uploadImage();
      };
    },
    //上传图片
    uploadImage: function uploadImage() {
      if (this.uploadInput.files.length + this.imageList.children.length > this.opt.num) {
        this.createUploadBox();
        alert('图片数量超出限制，请重新选择');
        return;
      }

      for (j = 0; j < this.uploadInput.files.length; j++) {
        var file = this.uploadInput.files[j];

        if (!file || this.limitedSize(file)) {
          this.createUploadBox();
          return false;
        }

        var reader = new FileReader();

        var _this = this;

        reader.filename = file.name;

        reader.onload = function (e) {
          _this.limitedWidthAndHeight(e.target.result, e.target.filename);
        };

        reader.readAsDataURL(file);
      }

      if (this.uploadInput.files.length + this.imageList.children.length < this.opt.num) {
        this.createUploadBox();
      }
    },
    //检测图片大小限制
    limitedSize: function limitedSize(file) {
      if (this.opt.minSize && file.size < this.opt.minSize * 1024) {
        alert('图片' + file.name + '大小未到最小限制，请重新选择');
        return true;
      }

      if (this.opt.maxSize && file.size > this.opt.maxSize * 1024) {
        alert('图片' + file.name + '大小超出最大限制，请重新选择');
        return true;
      }

      if (this.opt.limitedSize && file.size > this.opt.limitedSize * 1024) {
        alert('图片' + file.name + '大小不符合要求，请重新选择');
        return true;
      }

      return false;
    },
    //检测图片像素限制
    limitedWidthAndHeight: function limitedWidthAndHeight(src, name) {
      var tempImage = new Image();
      tempImage.src = src;

      var _this = this;

      tempImage.onload = function () {
        if (_this.opt.minWidth && this.width < _this.opt.minWidth) {
          alert('图片' + name + '宽度未到最小限制，请重新选择');

          _this.isCreateUploadBox();

          return false;
        }

        if (_this.opt.minHeight && this.height < _this.opt.minHeight) {
          alert('图片' + name + '高度未到最小限制，请重新选择');

          _this.isCreateUploadBox();

          return false;
        }

        if (_this.opt.maxWidth && this.width > _this.opt.maxWidth) {
          alert('图片' + name + '宽度超出最大限制，请重新选择');

          _this.isCreateUploadBox();

          return false;
        }

        if (_this.opt.maxHeight && this.height > _this.opt.maxHeight) {
          alert('图片' + name + '高度超出最大限制，请重新选择');

          _this.isCreateUploadBox();

          return false;
        }

        if (_this.opt.limitedWidth && this.width != _this.opt.limitedWidth) {
          alert('图片' + name + '宽度不符合要求，请重新选择');

          _this.isCreateUploadBox();

          return false;
        }

        if (_this.opt.limitedHeight && this.height != _this.opt.limitedHeight) {
          alert('图片' + name + '高度不符合要求，请重新选择');

          _this.isCreateUploadBox();

          return false;
        }

        _this.foreachNum(src, name, this.width, this.height);
      };
    },
    //检测图片数量
    foreachNum: function foreachNum(src, name, width, height) {
      if (this.opt.url) {
        var key = this.opt.name;
        var data = {};
        data[key] = src;

        var _this = this;

        this.ajaxUploadImage(data, function (res) {
          _this.createImageBox(res.responseText, res.responseText, width, height);
        });
      } else {
        this.createImageBox(src, name, width, height);
      }
    },
    //图片异步上传
    ajaxUploadImage: function ajaxUploadImage(data, success) {
      var xhr = null;

      if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
      } else {
        xhr = new ActiveXObject('Microsoft.XMLHTTP');
      }

      if (_typeof(data) == 'object') {
        var str = '';

        for (var key in data) {
          str += key + '=' + data[key] + '&';
        }

        data = str.replace(/&$/, '');
      }

      xhr.open('POST', this.opt.url, true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send(data);

      xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
          if (xhr.status == 200) {
            success(xhr);
          } else {
            alert(xhr.responseText.split("</p>")[0].split("<p>")[1]);
            return false;
          }
        }
      };
    },
    //创建图片框
    createImageBox: function createImageBox(src, name, width, height) {
      var state = arguments.length > 4 && arguments[4] !== undefined ? arguments[4] : true;
      this.imageArr[this.i] = src;
      this.widthArr[this.i] = width;
      this.heightArr[this.i] = height;
      this.imageBox[this.i] = document.createElement('li');
      this.imageBox[this.i].className = 'cupload-image-box';
      this.imageBox[this.i].style.position = 'relative';
      this.imageBox[this.i].style.display = 'inline-block';
      this.imageBox[this.i].style.marginRight = 8 + 'px';
      this.imageBox[this.i].style.backgroundColor = '#fbfdff';
      this.imageBox[this.i].style.border = '1px solid #c0ccda';
      this.imageBox[this.i].style.borderRadius = '6px';
      this.imageBox[this.i].style.WebkitBoxSizing = 'border-box';
      this.imageBox[this.i].style.boxSizing = 'border-box';
      this.imageBox[this.i].style.width = this.opt.width + 'px';
      this.imageBox[this.i].style.height = this.opt.height + 'px';
      this.imageList.appendChild(this.imageBox[this.i]);
      this.createImagePreview(src, width, height);
      this.createImageInput(src);
      this.createImageDelete(name);

      if (!state) {
        this.setDefaultImage();
      }

      var _this = this;

      for (var m = 0; m <= this.i; m++) {
        this.imageBox[m].index = m;

        this.imageBox[m].onmouseover = function (n) {
          return function () {
            _this.showImageDelete(n);
          };
        }(m);

        this.imageBox[m].onmouseout = function (n) {
          return function () {
            _this.hideImageDelete(n);
          };
        }(m);
      }

      this.i++;
    },
    //创建图片预览框
    createImagePreview: function createImagePreview(src, width, height) {
      this.imagePreview[this.i] = document.createElement('img');
      this.imagePreview[this.i].className = 'cupload-image-preview';
      this.imagePreview[this.i].style.position = 'absolute';
      this.imagePreview[this.i].style.top = 0;
      this.imagePreview[this.i].style.left = 0;
      this.imagePreview[this.i].style.right = 0;
      this.imagePreview[this.i].style.bottom = 0;
      this.imagePreview[this.i].style.margin = 'auto';
      this.imagePreview[this.i].src = src;
      this.setImageAttribute(width, height);
      this.imageBox[this.i].appendChild(this.imagePreview[this.i]);
    },
    //创建图片input
    createImageInput: function createImageInput(src) {
      this.imageInput[this.i] = document.createElement('input');
      this.imageInput[this.i].type = 'hidden';
      this.imageInput[this.i].name = this.opt.name + '[]';
      this.imageInput[this.i].value = src;
      this.imageBox[this.i].appendChild(this.imageInput[this.i]);
    },
    //创建删除
    createImageDelete: function createImageDelete(name) {
      this.imageDelete[this.i] = document.createElement('div');
      this.imageDelete[this.i].className = 'cupload-image-delete';
      this.imageDelete[this.i].style.position = 'absolute';
      this.imageDelete[this.i].style.width = '100%';
      this.imageDelete[this.i].style.height = '100%';
      this.imageDelete[this.i].style.left = 0;
      this.imageDelete[this.i].style.top = 0;
      this.imageDelete[this.i].style.textAlign = 'center';
      this.imageDelete[this.i].style.color = '#fff';
      this.imageDelete[this.i].style.opacity = 0;
      this.imageDelete[this.i].style.cursor = 'zoom-in';
      this.imageDelete[this.i].style.backgroundColor = 'rgba(0,0,0,.5)';
      this.imageDelete[this.i].style.WebkitTransition = '.3s';
      this.imageDelete[this.i].style.transition = '.3s';
      this.imageDelete[this.i].title = name;
      this.imageBox[this.i].appendChild(this.imageDelete[this.i]);
      this.createDeleteBtn();
      this.createSortBtn();

      var _this = this;

      for (var m = 0; m <= this.i; m++) {
        this.imageDelete[m].onclick = function (n) {
          return function () {
            _this.zoomInImage(n);
          };
        }(m);
      }
    },
    //创建删除按钮
    createDeleteBtn: function createDeleteBtn() {
      this.deleteBtn[this.i] = document.createElement('span');
      this.deleteBtn[this.i].className = 'cupload-delete-btn';
      this.deleteBtn[this.i].style.position = 'absolute';
      this.deleteBtn[this.i].style.top = 0;
      this.deleteBtn[this.i].style.right = 0;
      this.deleteBtn[this.i].style.margin = 0;
      this.deleteBtn[this.i].style.padding = 0;
      this.deleteBtn[this.i].style.fontSize = '18px';
      this.deleteBtn[this.i].style.width = '24px';
      this.deleteBtn[this.i].style.height = '24px';
      this.deleteBtn[this.i].style.cursor = 'pointer';
      this.deleteBtn[this.i].style.backgroundImage = "url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAABmJLR0QA/wD/AP+gvaeTAAAAwUlEQVRYhe2WwQ3CMAxFPxXqOjAAqGwHo3QNCIxSxuBzcaRStcRxcin4XSJHjv2aNkoBRwHJhmSgnhvJpqbAPqN5ZKeprbU8ydhvEgDoJ2uqCHQyXhW5Maf7mrUEyYdhu7WEab+5HXiZzJXPp88Uijsm6tQ7KkZcYF0CckSDNi5i7uudzqXipbkx63oFLuACPymwzcy/4/NKTcV2/Dp2AQBPACB5sBYneRzXyl18qfAXHDlbBFqRGAoaD1KjzRb4G96BvtfyCUSIygAAAABJRU5ErkJggg==')";
      this.deleteBtn[this.i].style.backgroundSize = '18px 18px';
      this.deleteBtn[this.i].style.backgroundRepeat = 'no-repeat';
      this.deleteBtn[this.i].style.backgroundPosition = 'right top';
      this.deleteBtn[this.i].innerHTML = '';
      this.deleteBtn[this.i].title = '删除';
      this.imageDelete[this.i].appendChild(this.deleteBtn[this.i]);

      var _this = this;

      for (var m = 0; m <= this.i; m++) {
        this.deleteBtn[m].onclick = function (n) {
          return function () {
            _this.deleteImage(n);
          };
        }(m);
      }
    },
    createSortBtn: function createSortBtn() {
      this.sortLeftBtn[this.i] = document.createElement('span');
      this.sortLeftBtn[this.i].className = 'cupload-sort-left';
      this.sortLeftBtn[this.i].style.position = 'absolute';
      this.sortLeftBtn[this.i].style.bottom = 0;
      this.sortLeftBtn[this.i].style.left = 0;
      this.sortLeftBtn[this.i].style.margin = 0;
      this.sortLeftBtn[this.i].style.padding = 0;
      this.sortLeftBtn[this.i].style.fontSize = '18px';
      this.sortLeftBtn[this.i].style.width = '24px';
      this.sortLeftBtn[this.i].style.height = '24px';
      this.sortLeftBtn[this.i].style.cursor = 'pointer';
      this.sortLeftBtn[this.i].style.backgroundImage = "url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAABmJLR0QA/wD/AP+gvaeTAAABP0lEQVRYhe2UIUsEURRGv7suGza4sCBoENYgGMwWs/4A/4AWwWRyMfgHRCyKGhWsYtegRYOCCGoUk1kwKLiws8dywRFGcXZ23yDMiW8e75z3YK5UUPBfAQbzlK8BEbCa9axySrFJ2pC0klWcGsCALb7Y8aAg8gHgICZfDyJ2eQU4dnEHCPf8QBU4dXkELIaU14BLl7eB+ZDyOnDt8g9gLqR8BHhw+Rsw00/ft98IaEg6lzTmS2eSbnroiyTtm9lT4ldgm/6z+9sLTPoLDPnSraTk2u5oSdo0s7sfdwATwLPXvgBTPQz4G0ADePSIV2A6j4hh4N4j3oHZPCLqwJVHtAg5D2IRNeDCI8JOxFhEFTjxiA6wnEdEBTiKRTTziCgDh7GhspT1zFKazWbWlrQgac+XRrMGdA0wDqS6QEFBEp/yS6NBq8E1tgAAAABJRU5ErkJggg==')";
      this.sortLeftBtn[this.i].style.backgroundSize = '18px 18px';
      this.sortLeftBtn[this.i].style.backgroundRepeat = 'no-repeat';
      this.sortLeftBtn[this.i].style.backgroundPosition = 'left bottom';
      this.sortLeftBtn[this.i].innerHTML = '';
      this.sortLeftBtn[this.i].title = '左移';
      this.imageDelete[this.i].appendChild(this.sortLeftBtn[this.i]);
      this.sortRightBtn[this.i] = document.createElement('span');
      this.sortRightBtn[this.i].className = 'cupload-sort-right';
      this.sortRightBtn[this.i].style.position = 'absolute';
      this.sortRightBtn[this.i].style.bottom = 0;
      this.sortRightBtn[this.i].style.right = 0;
      this.sortRightBtn[this.i].style.margin = 0;
      this.sortRightBtn[this.i].style.padding = 0;
      this.sortRightBtn[this.i].style.fontSize = '18px';
      this.sortRightBtn[this.i].style.width = '24px';
      this.sortRightBtn[this.i].style.height = '24px';
      this.sortRightBtn[this.i].style.cursor = 'pointer';
      this.sortRightBtn[this.i].style.backgroundImage = "url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAABmJLR0QA/wD/AP+gvaeTAAAA4UlEQVRYhe3WMUpDQRCA4XkKWlhIqnQWwc4iKbyBTVohJ/AC2lh4gxxBA7lAqhwgvbWtpYWVnVgI4mfhghKeEPCFSeD93cIu8w+7OzMRLS3bDga4Qy9LYOqbZ5xkCBzjqUi84DRD4giPReIVZxkSXTwUiTcMMyQ6uC8S7xhlSBxgUSQ+cJEhsY95kfjEVYbEHmZ+GNftq2oOHkbETkMeuxExiYjzsh5XVXXz525cWz+Xv2MuZ6qhzFdms66gSVZ9hOsKnvcNZRYimaVYZjOS2Y5lDyQ2YCTr41bWUNrS8l++ABQQn/PCTE8cAAAAAElFTkSuQmCC')";
      this.sortRightBtn[this.i].style.backgroundSize = '18px 18px';
      this.sortRightBtn[this.i].style.backgroundRepeat = 'no-repeat';
      this.sortRightBtn[this.i].style.backgroundPosition = 'right bottom';
      this.sortRightBtn[this.i].innerHTML = '';
      this.sortRightBtn[this.i].title = '右移';
      this.imageDelete[this.i].appendChild(this.sortRightBtn[this.i]);

      var _this = this;

      for (var m = 0; m <= this.i; m++) {
        this.sortLeftBtn[m].onclick = function (n) {
          return function () {
            _this.sortLeft(event, n);
          };
        }(m);

        this.sortRightBtn[m].onclick = function (n) {
          return function () {
            _this.sortRight(event, n);
          };
        }(m);
      }
    },
    //设置默认图片
    setDefaultImage: function setDefaultImage() {
      this.imageBox[this.i].style.backgroundColor = "#B2B2B2";
      this.imageDelete[this.i].title = '图片不存在';
      this.imagePreview[this.i].src = 'data:image/png;base64,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';

      if (130 / this.opt.width > 105 / this.opt.height) {
        this.imagePreview[this.i].style.width = this.opt.width - 2 + 'px';
        this.imagePreview[this.i].style.height = 105 / (130 / this.opt.width) - 2 + 'px';
      } else {
        this.imagePreview[this.i].style.width = 130 / (105 / this.opt.height) - 2 + 'px';
        this.imagePreview[this.i].style.height = this.opt.height - 2 + 'px';
      }
    },
    //设置图片宽高
    setImageAttribute: function setImageAttribute(width, height) {
      if (width / this.opt.width > height / this.opt.height) {
        this.imagePreview[this.i].style.width = this.opt.width - 2 + 'px';
        this.imagePreview[this.i].style.height = height / (width / this.opt.width) - 2 + 'px';
      } else {
        this.imagePreview[this.i].style.width = width / (height / this.opt.height) - 2 + 'px';
        this.imagePreview[this.i].style.height = this.opt.height - 2 + 'px';
      }
    },
    //data图片预览
    showImagePreview: function showImagePreview() {
      var obj = this.opt.data;

      if (obj.length >= this.opt.num) {
        this.removeUploadBox();
      }

      var _this = this;

      var tempImage = new Image();
      tempImage.src = obj[this.i];

      tempImage.onload = function () {
        _this.createImageBox(obj[_this.i], obj[_this.i], this.width, this.height);

        setTimeout(function () {
          if (obj[_this.i]) {
            _this.showImagePreview();
          }
        }, 0);
      };

      tempImage.onerror = function () {
        _this.createImageBox(obj[_this.i], obj[_this.i], 0, 0, false);

        setTimeout(function () {
          if (obj[_this.i]) {
            _this.showImagePreview();
          }
        }, 0);
      };
    },
    //图片放大预览
    zoomInImage: function zoomInImage(n) {
      if (event.target.classList[0] === 'cupload-delete-btn' || event.target.classList[0] === 'cupload-sort-right' || event.target.classList[0] === 'cupload-sort-left') {
        return;
      }

      if (this.imagePreview[n].src == 'data:image/png;base64,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') {
        alert('图片不存在');
        return;
      }

      this.zommImage = document.createElement('img');
      this.zommImage.style.display = "inline-block";
      this.zommImage.style.verticalAlign = "middle";
      this.zommImage.src = this.imageArr[n];

      if (this.widthArr[n] / window.innerWidth > this.heightArr[n] / window.innerHeight) {
        this.zommImage.style.width = 0.8 * window.innerWidth + 'px';
        this.zommImage.style.height = 0.8 * this.heightArr[n] / (this.widthArr[n] / window.innerWidth) + 'px';
      } else {
        this.zommImage.style.width = 0.8 * this.widthArr[n] / (this.heightArr[n] / window.innerHeight) + 'px';
        this.zommImage.style.height = 0.8 * window.innerHeight + 'px';
      }

      this.overlay.appendChild(this.zommImage);
      this.overlay.style.lineHeight = window.innerHeight + 'px';
      this.overlay.style.cursor = "zoom-out";
      this.overlay.style.display = "block";
    },
    //关闭图片放大预览
    zoomOutImage: function zoomOutImage() {
      this.overlay.style.display = "none";
      this.zommImage.remove();
    },
    //检测当前图片数量，判断是否创建上传框
    isCreateUploadBox: function isCreateUploadBox() {
      this.removeUploadBox();

      if (this.imageList.children.length < this.opt.num) {
        this.createUploadBox();
      }
    },
    //删除图片
    deleteImage: function deleteImage(n) {
      this.imageBox[n].remove();
      this.removeUploadBox();

      if (this.imageList.children.length < this.opt.num) {
        this.createUploadBox();
      }

      if (this.opt.deleteUrl) {
        var xhr = null;
        var key = this.opt.name;
        var data = {};
        data[key] = this.imageArr[n];
        data['id'] = n;

        if (window.XMLHttpRequest) {
          xhr = new XMLHttpRequest();
        } else {
          xhr = new ActiveXObject('Microsoft.XMLHTTP');
        }

        if (_typeof(data) == 'object') {
          var str = '';

          for (var key in data) {
            str += key + '=' + data[key] + '&';
          }

          data = str.replace(/&$/, '');
        }

        xhr.open('POST', this.opt.deleteUrl, true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send(data);

        xhr.onreadystatechange = function () {
          if (xhr.readyState == 4) {
            if (xhr.status == 200) {
              console.log(xhr.response);
            } else {
              alert(xhr.responseText.split("</p>")[0].split("<p>")[1]);
              return false;
            }
          }
        };
      }
    },
    sortLeft: function sortLeft(event, n) {
      if (this.imageBox[n].previousSibling) {
        this.imageList.insertBefore(this.imageBox[n], this.imageBox[n].previousSibling);
      }
    },
    sortRight: function sortRight(event, n) {
      if (this.imageBox[n].nextSibling) {
        this.imageList.insertBefore(this.imageBox[n].nextSibling, this.imageBox[n]);
      }
    },
    //移除上传框
    removeUploadBox: function removeUploadBox() {
      this.uploadBox.remove();
    },
    //显示图片删除
    showImageDelete: function showImageDelete(m) {
      this.imageDelete[m].style.opacity = 1;
    },
    //隐藏图片删除
    hideImageDelete: function hideImageDelete(m) {
      this.imageDelete[m].style.opacity = 0;
    }
  };
  window.Cupload = Cupload;
})(window, document);

/***/ }),

/***/ "./resources/sass/Individual.scss":
/*!****************************************!*\
  !*** ./resources/sass/Individual.scss ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/ant-message.scss":
/*!*****************************************!*\
  !*** ./resources/sass/ant-message.scss ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/detail.scss":
/*!************************************!*\
  !*** ./resources/sass/detail.scss ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/footer.scss":
/*!************************************!*\
  !*** ./resources/sass/footer.scss ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/header.scss":
/*!************************************!*\
  !*** ./resources/sass/header.scss ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/index.scss":
/*!***********************************!*\
  !*** ./resources/sass/index.scss ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/login.scss":
/*!***********************************!*\
  !*** ./resources/sass/login.scss ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/message.scss":
/*!*************************************!*\
  !*** ./resources/sass/message.scss ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/new.scss":
/*!*********************************!*\
  !*** ./resources/sass/new.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/person.scss":
/*!************************************!*\
  !*** ./resources/sass/person.scss ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** multi ./resources/cupload/js/cupload.js ./resources/sass/app.scss ./resources/sass/index.scss ./resources/sass/Individual.scss ./resources/sass/login.scss ./resources/sass/message.scss ./resources/sass/new.scss ./resources/sass/detail.scss ./resources/sass/person.scss ./resources/sass/header.scss ./resources/sass/footer.scss ./resources/sass/ant-message.scss ***!
  \********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /home/vagrant/Code/flexispot-bbs/resources/cupload/js/cupload.js */"./resources/cupload/js/cupload.js");
__webpack_require__(/*! /home/vagrant/Code/flexispot-bbs/resources/sass/app.scss */"./resources/sass/app.scss");
__webpack_require__(/*! /home/vagrant/Code/flexispot-bbs/resources/sass/index.scss */"./resources/sass/index.scss");
__webpack_require__(/*! /home/vagrant/Code/flexispot-bbs/resources/sass/Individual.scss */"./resources/sass/Individual.scss");
__webpack_require__(/*! /home/vagrant/Code/flexispot-bbs/resources/sass/login.scss */"./resources/sass/login.scss");
__webpack_require__(/*! /home/vagrant/Code/flexispot-bbs/resources/sass/message.scss */"./resources/sass/message.scss");
__webpack_require__(/*! /home/vagrant/Code/flexispot-bbs/resources/sass/new.scss */"./resources/sass/new.scss");
__webpack_require__(/*! /home/vagrant/Code/flexispot-bbs/resources/sass/detail.scss */"./resources/sass/detail.scss");
__webpack_require__(/*! /home/vagrant/Code/flexispot-bbs/resources/sass/person.scss */"./resources/sass/person.scss");
__webpack_require__(/*! /home/vagrant/Code/flexispot-bbs/resources/sass/header.scss */"./resources/sass/header.scss");
__webpack_require__(/*! /home/vagrant/Code/flexispot-bbs/resources/sass/footer.scss */"./resources/sass/footer.scss");
module.exports = __webpack_require__(/*! /home/vagrant/Code/flexispot-bbs/resources/sass/ant-message.scss */"./resources/sass/ant-message.scss");


/***/ })

/******/ });