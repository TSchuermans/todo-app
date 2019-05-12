/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.css');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
// const $ = require('jquery');

window.onload = function () {
    const todoListItems = document.querySelectorAll('.todo-list-item');

    todoListItems.forEach(
        (todoListItem) => {
            todoListItem.onclick = (event) => {
                event.target.classList.toggle('todo-list-item-done');
                event.target.classList.toggle('todo-list-item');

                const request = new XMLHttpRequest();

                request.open("get", event.target.href, true);
                request.send();

                event.stopPropagation();
                event.preventDefault();

                return false;
            }
        }
    );
};
