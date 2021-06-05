/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/dashboard.js":
/*!***********************************!*\
  !*** ./resources/js/dashboard.js ***!
  \***********************************/
/***/ (() => {

eval("function readURL(input) {\n  if (input.files && input.files[0]) {\n    var reader = new FileReader();\n\n    reader.onload = function (e) {\n      $('#imagem').attr('src', e.target.result);\n    };\n\n    reader.readAsDataURL(input.files[0]);\n  }\n}\n\n$('#input-image').change(function () {\n  readURL(this);\n});\n\nwindow.onload = function () {\n  CKEDITOR.replace('content');\n  CKEDITOR.replace('about');\n};\n\n$('.money').mask('R$ 000.000.000.000.000,00', {\n  reverse: true\n});\n$('.js-example-basic').select2({\n  closeOnSelect: true\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvZGFzaGJvYXJkLmpzPzI0YjYiXSwibmFtZXMiOlsicmVhZFVSTCIsImlucHV0IiwiZmlsZXMiLCJyZWFkZXIiLCJGaWxlUmVhZGVyIiwib25sb2FkIiwiZSIsIiQiLCJhdHRyIiwidGFyZ2V0IiwicmVzdWx0IiwicmVhZEFzRGF0YVVSTCIsImNoYW5nZSIsIndpbmRvdyIsIkNLRURJVE9SIiwicmVwbGFjZSIsIm1hc2siLCJyZXZlcnNlIiwic2VsZWN0MiIsImNsb3NlT25TZWxlY3QiXSwibWFwcGluZ3MiOiJBQUFBLFNBQVNBLE9BQVQsQ0FBaUJDLEtBQWpCLEVBQXdCO0FBQ3BCLE1BQUlBLEtBQUssQ0FBQ0MsS0FBTixJQUFlRCxLQUFLLENBQUNDLEtBQU4sQ0FBWSxDQUFaLENBQW5CLEVBQW1DO0FBQy9CLFFBQUlDLE1BQU0sR0FBRyxJQUFJQyxVQUFKLEVBQWI7O0FBQ0FELElBQUFBLE1BQU0sQ0FBQ0UsTUFBUCxHQUFnQixVQUFTQyxDQUFULEVBQVk7QUFDeEJDLE1BQUFBLENBQUMsQ0FBQyxTQUFELENBQUQsQ0FBYUMsSUFBYixDQUFrQixLQUFsQixFQUF5QkYsQ0FBQyxDQUFDRyxNQUFGLENBQVNDLE1BQWxDO0FBQ0gsS0FGRDs7QUFHQVAsSUFBQUEsTUFBTSxDQUFDUSxhQUFQLENBQXFCVixLQUFLLENBQUNDLEtBQU4sQ0FBWSxDQUFaLENBQXJCO0FBQ0g7QUFDSjs7QUFDREssQ0FBQyxDQUFDLGNBQUQsQ0FBRCxDQUFrQkssTUFBbEIsQ0FBeUIsWUFBVztBQUNoQ1osRUFBQUEsT0FBTyxDQUFDLElBQUQsQ0FBUDtBQUNILENBRkQ7O0FBSUFhLE1BQU0sQ0FBQ1IsTUFBUCxHQUFnQixZQUFXO0FBQ3ZCUyxFQUFBQSxRQUFRLENBQUNDLE9BQVQsQ0FBaUIsU0FBakI7QUFDQUQsRUFBQUEsUUFBUSxDQUFDQyxPQUFULENBQWlCLE9BQWpCO0FBQ0gsQ0FIRDs7QUFLQVIsQ0FBQyxDQUFDLFFBQUQsQ0FBRCxDQUFZUyxJQUFaLENBQWlCLDJCQUFqQixFQUE4QztBQUFDQyxFQUFBQSxPQUFPLEVBQUU7QUFBVixDQUE5QztBQUNBVixDQUFDLENBQUMsbUJBQUQsQ0FBRCxDQUF1QlcsT0FBdkIsQ0FBK0I7QUFDM0JDLEVBQUFBLGFBQWEsRUFBRTtBQURZLENBQS9CIiwic291cmNlc0NvbnRlbnQiOlsiZnVuY3Rpb24gcmVhZFVSTChpbnB1dCkge1xuICAgIGlmIChpbnB1dC5maWxlcyAmJiBpbnB1dC5maWxlc1swXSkge1xuICAgICAgICB2YXIgcmVhZGVyID0gbmV3IEZpbGVSZWFkZXIoKVxuICAgICAgICByZWFkZXIub25sb2FkID0gZnVuY3Rpb24oZSkge1xuICAgICAgICAgICAgJCgnI2ltYWdlbScpLmF0dHIoJ3NyYycsIGUudGFyZ2V0LnJlc3VsdClcbiAgICAgICAgfVxuICAgICAgICByZWFkZXIucmVhZEFzRGF0YVVSTChpbnB1dC5maWxlc1swXSlcbiAgICB9XG59XG4kKCcjaW5wdXQtaW1hZ2UnKS5jaGFuZ2UoZnVuY3Rpb24oKSB7XG4gICAgcmVhZFVSTCh0aGlzKVxufSlcblxud2luZG93Lm9ubG9hZCA9IGZ1bmN0aW9uKCkge1xuICAgIENLRURJVE9SLnJlcGxhY2UoJ2NvbnRlbnQnKTtcbiAgICBDS0VESVRPUi5yZXBsYWNlKCdhYm91dCcpO1xufTtcblxuJCgnLm1vbmV5JykubWFzaygnUiQgMDAwLjAwMC4wMDAuMDAwLjAwMCwwMCcsIHtyZXZlcnNlOiB0cnVlfSlcbiQoJy5qcy1leGFtcGxlLWJhc2ljJykuc2VsZWN0Mih7XG4gICAgY2xvc2VPblNlbGVjdDogdHJ1ZVxufSk7Il0sImZpbGUiOiIuL3Jlc291cmNlcy9qcy9kYXNoYm9hcmQuanMuanMiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/dashboard.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/dashboard.js"]();
/******/ 	
/******/ })()
;