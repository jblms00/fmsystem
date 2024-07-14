let wrapper = document.querySelector('.wrapper'),
    ADLink = document.querySelector('.sign-link .signup-link'),
    HOLink = document.querySelector('.link3 .login-btn3'),
    signInLink = document.querySelector('.link .signin-link');

ADLink.addEventListener('click', () => {
    wrapper.classList.add('animated-signin');
    wrapper.classList.remove('animated-signup');
});

signInLink.addEventListener('click', () => {
    wrapper.classList.add('animated-signup');
    wrapper.classList.remove('animated-signin');
});