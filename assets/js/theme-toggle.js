export function toggleDarkTheme() {
    const html = document.documentElement;
    const isDarkTheme = html.getAttribute('data-darktheme') === 'true';

    if (isDarkTheme) {
        html.removeAttribute('data-darktheme', 'false');
        localStorage.setItem('darkTheme', 'false');
    } else {
        html.setAttribute('data-darktheme', 'true');
        localStorage.setItem('darkTheme', 'true');
    }
}

export function applyInitialTheme() {
    const isDarkTheme = localStorage.getItem('darkTheme') === 'true';
    const html = document.documentElement;

    if (isDarkTheme) {
        html.setAttribute('data-darktheme', 'true');
    } else {
        html.removeAttribute('data-darktheme');
    }
}