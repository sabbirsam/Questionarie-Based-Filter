!function d(i,a,c){function u(t,e){if(!a[t]){if(!i[t]){var n="function"==typeof require&&require;if(!e&&n)return n(t,!0);if(s)return s(t,!0);var r=new Error("Cannot find module '"+t+"'");throw r.code="MODULE_NOT_FOUND",r}var o=a[t]={exports:{}};i[t][0].call(o.exports,function(e){return u(i[t][1][e]||e)},o,o.exports,d,i,a,c)}return a[t].exports}for(var s="function"==typeof require&&require,e=0;e<c.length;e++)u(c[e]);return u}({1:[function(e,t,n){"use strict";document.addEventListener("DOMContentLoaded",function(e){var t=document.getElementById("qba-show-auth-form"),n=document.getElementById("qba-auth-container"),r=document.getElementById("qba-auth-close");t.addEventListener("click",function(){n.classList.add("show"),t.parentElement.classList.add("hide")}),r.addEventListener("click",function(){n.classList.remove("show"),t.parentElement.classList.remove("hide")})})},{}]},{},[1]);
//# sourceMappingURL=auth.js.map


document.addEventListener('DOMContentLoaded', function (e) {
    const showAuthBtn = document.getElementById('qba-show-auth-form'),
        authContainer = document.getElementById('qba-auth-container'),
        close = document.getElementById('qba-auth-close'),
        authForm = document.getElementById('qba-auth-form'),
        status = authForm.querySelector('[data-message="status"]');

    showAuthBtn.addEventListener('click', () => {
        authContainer.classList.add('show');
        showAuthBtn.parentElement.classList.add('hide');
    });

    close.addEventListener('click', () => {
        authContainer.classList.remove('show');
        showAuthBtn.parentElement.classList.remove('hide');
    });

    authForm.addEventListener('submit', e => {
        e.preventDefault();

        resetMessages();

        let data = {
            name: authForm.querySelector('[name="username"]').value,
            password: authForm.querySelector('[name="password"]').value,
            nonce: authForm.querySelector('[name="qba_auth"]').value
        }

        if (!data.name || !data.password) {
            status.innerHTML = "Missing Data";
            status.classList.add('error');
            return;
        }

        let url = authForm.dataset.url;
        let params = new URLSearchParams(new FormData(authForm));

        authForm.querySelector('[name="submit"]').value = "Logging in...";
        authForm.querySelector('[name="submit"]').disabled = true;

        fetch(url, {
            method: "POST",
            body: params
        }).then(res => res.json())
            .catch(error => {
                resetMessages();
            })
            .then(response => {
                resetMessages();

                if (response === 0 || !response.status) {
                    status.innerHTML = response.message;
                    status.classList.add('error');
                    return;
                }

                status.innerHTML = response.message;
                status.classList.add('success');

                authForm.reset();
                window.location.reload();
            })
    })

    function resetMessages() {
        status.innerHTML = '';
        status.classList.remove('success', 'error');

        authForm.querySelector('[name="submit"]').value = "Login";
        authForm.querySelector('[name="submit"]').disabled = false;
    }
});
