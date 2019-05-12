(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["js/app"],{

/***/ "./assets/css/app.css":
/*!****************************!*\
  !*** ./assets/css/app.css ***!
  \****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./assets/js/app.js":
/*!**************************!*\
  !*** ./assets/js/app.js ***!
  \**************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
// any CSS you require will output into a single css file (app.css in this case)
__webpack_require__(/*! ../css/app.css */ "./assets/css/app.css"); // Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
// const $ = require('jquery');


window.onload = function () {
  var todoListItems = document.querySelectorAll('.todo-list-item');
  todoListItems.forEach(function (todoListItem) {
    todoListItem.onclick = function (event) {
      event.target.classList.toggle('todo-list-item-done');
      event.target.classList.toggle('todo-list-item');
      var request = new XMLHttpRequest();
      request.open("get", event.target.href, true);
      request.send();
      event.stopPropagation();
      event.preventDefault();
      return false;
    };
  });
};

/***/ })

},[["./assets/js/app.js","runtime"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvY3NzL2FwcC5jc3MiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2pzL2FwcC5qcyJdLCJuYW1lcyI6WyJyZXF1aXJlIiwid2luZG93Iiwib25sb2FkIiwidG9kb0xpc3RJdGVtcyIsImRvY3VtZW50IiwicXVlcnlTZWxlY3RvckFsbCIsImZvckVhY2giLCJ0b2RvTGlzdEl0ZW0iLCJvbmNsaWNrIiwiZXZlbnQiLCJ0YXJnZXQiLCJjbGFzc0xpc3QiLCJ0b2dnbGUiLCJyZXF1ZXN0IiwiWE1MSHR0cFJlcXVlc3QiLCJvcGVuIiwiaHJlZiIsInNlbmQiLCJzdG9wUHJvcGFnYXRpb24iLCJwcmV2ZW50RGVmYXVsdCJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7O0FBQUEsdUM7Ozs7Ozs7Ozs7O0FDQUE7Ozs7OztBQU9BO0FBQ0FBLG1CQUFPLENBQUMsNENBQUQsQ0FBUCxDLENBRUE7QUFDQTs7O0FBRUFDLE1BQU0sQ0FBQ0MsTUFBUCxHQUFnQixZQUFZO0FBQ3hCLE1BQU1DLGFBQWEsR0FBR0MsUUFBUSxDQUFDQyxnQkFBVCxDQUEwQixpQkFBMUIsQ0FBdEI7QUFFQUYsZUFBYSxDQUFDRyxPQUFkLENBQ0ksVUFBQ0MsWUFBRCxFQUFrQjtBQUNkQSxnQkFBWSxDQUFDQyxPQUFiLEdBQXVCLFVBQUNDLEtBQUQsRUFBVztBQUM5QkEsV0FBSyxDQUFDQyxNQUFOLENBQWFDLFNBQWIsQ0FBdUJDLE1BQXZCLENBQThCLHFCQUE5QjtBQUNBSCxXQUFLLENBQUNDLE1BQU4sQ0FBYUMsU0FBYixDQUF1QkMsTUFBdkIsQ0FBOEIsZ0JBQTlCO0FBRUEsVUFBTUMsT0FBTyxHQUFHLElBQUlDLGNBQUosRUFBaEI7QUFFQUQsYUFBTyxDQUFDRSxJQUFSLENBQWEsS0FBYixFQUFvQk4sS0FBSyxDQUFDQyxNQUFOLENBQWFNLElBQWpDLEVBQXVDLElBQXZDO0FBQ0FILGFBQU8sQ0FBQ0ksSUFBUjtBQUVBUixXQUFLLENBQUNTLGVBQU47QUFDQVQsV0FBSyxDQUFDVSxjQUFOO0FBRUEsYUFBTyxLQUFQO0FBQ0gsS0FiRDtBQWNILEdBaEJMO0FBa0JILENBckJELEMiLCJmaWxlIjoianMvYXBwLmpzIiwic291cmNlc0NvbnRlbnQiOlsiLy8gZXh0cmFjdGVkIGJ5IG1pbmktY3NzLWV4dHJhY3QtcGx1Z2luIiwiLypcbiAqIFdlbGNvbWUgdG8geW91ciBhcHAncyBtYWluIEphdmFTY3JpcHQgZmlsZSFcbiAqXG4gKiBXZSByZWNvbW1lbmQgaW5jbHVkaW5nIHRoZSBidWlsdCB2ZXJzaW9uIG9mIHRoaXMgSmF2YVNjcmlwdCBmaWxlXG4gKiAoYW5kIGl0cyBDU1MgZmlsZSkgaW4geW91ciBiYXNlIGxheW91dCAoYmFzZS5odG1sLnR3aWcpLlxuICovXG5cbi8vIGFueSBDU1MgeW91IHJlcXVpcmUgd2lsbCBvdXRwdXQgaW50byBhIHNpbmdsZSBjc3MgZmlsZSAoYXBwLmNzcyBpbiB0aGlzIGNhc2UpXG5yZXF1aXJlKCcuLi9jc3MvYXBwLmNzcycpO1xuXG4vLyBOZWVkIGpRdWVyeT8gSW5zdGFsbCBpdCB3aXRoIFwieWFybiBhZGQganF1ZXJ5XCIsIHRoZW4gdW5jb21tZW50IHRvIHJlcXVpcmUgaXQuXG4vLyBjb25zdCAkID0gcmVxdWlyZSgnanF1ZXJ5Jyk7XG5cbndpbmRvdy5vbmxvYWQgPSBmdW5jdGlvbiAoKSB7XG4gICAgY29uc3QgdG9kb0xpc3RJdGVtcyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoJy50b2RvLWxpc3QtaXRlbScpO1xuXG4gICAgdG9kb0xpc3RJdGVtcy5mb3JFYWNoKFxuICAgICAgICAodG9kb0xpc3RJdGVtKSA9PiB7XG4gICAgICAgICAgICB0b2RvTGlzdEl0ZW0ub25jbGljayA9IChldmVudCkgPT4ge1xuICAgICAgICAgICAgICAgIGV2ZW50LnRhcmdldC5jbGFzc0xpc3QudG9nZ2xlKCd0b2RvLWxpc3QtaXRlbS1kb25lJyk7XG4gICAgICAgICAgICAgICAgZXZlbnQudGFyZ2V0LmNsYXNzTGlzdC50b2dnbGUoJ3RvZG8tbGlzdC1pdGVtJyk7XG4gICAgICAgICAgICAgICAgXG4gICAgICAgICAgICAgICAgY29uc3QgcmVxdWVzdCA9IG5ldyBYTUxIdHRwUmVxdWVzdCgpO1xuXG4gICAgICAgICAgICAgICAgcmVxdWVzdC5vcGVuKFwiZ2V0XCIsIGV2ZW50LnRhcmdldC5ocmVmLCB0cnVlKTtcbiAgICAgICAgICAgICAgICByZXF1ZXN0LnNlbmQoKTtcblxuICAgICAgICAgICAgICAgIGV2ZW50LnN0b3BQcm9wYWdhdGlvbigpO1xuICAgICAgICAgICAgICAgIGV2ZW50LnByZXZlbnREZWZhdWx0KCk7XG5cbiAgICAgICAgICAgICAgICByZXR1cm4gZmFsc2U7XG4gICAgICAgICAgICB9XG4gICAgICAgIH1cbiAgICApO1xufTtcbiJdLCJzb3VyY2VSb290IjoiIn0=