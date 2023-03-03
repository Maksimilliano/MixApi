export const setLocalItem = (keyName, item) => {
    localStorage.setItem(keyName, JSON.stringify(item));
}

export const getLocalItem = (keyName) => {
    return JSON.parse(localStorage.getItem(keyName));
}
