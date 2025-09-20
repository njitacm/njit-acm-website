function getAssetUrl(path) {
    return new URL(path, import.meta.url).href;
}

export { getAssetUrl };