const IMAGES = import.meta.glob(
    [
        // add as needed for more image extensions
        '/src/assets/**/*.jpg',
        '/src/assets/**/*.jpeg',
        '/src/assets/**/*.png',
        '/src/assets/**/*.svg',
    ],
    // The 'eager: true' option loads all images at once,
    // which might cause performance issues for many images.
    { eager: false, query: '?url', import: 'default' }
);

/**
 * Retrieves the URL of an image via glob import.
 * @param {string} name - The name of the image file.
 * @returns {Promise<string>} - The URL of the image.
 * @throws {Error} - If the image is not found.
 */
async function getImageUrl(name) {
    const imagePath = `/src/assets/${name}`;

    // Check if the image exists in our glob import
    if (!IMAGES[imagePath]) {
        throw new Error(`Image not found: ${name}`);
    }

    // Call the importer function. This returns a Promise.
    const importer = IMAGES[imagePath];
    const module = await importer();

    // The resolved module will have a 'default' property with the URL.
    return module;
}

/**
 * Parses raw text into structured objects for Vue dynamic components.
 * @param {string} rawText - The entire text file string.
 * @returns {Array} - Array of objects { tag, content, className }
 */
const parseConstitution = (rawText) => {
    // 1. Split by newlines to process line-by-line
    const lines = rawText.split('\n');

    return lines.map((line, index) => {
        // Clean up whitespace
        const text = line.trim();

        // 2. Define Regex Patterns
        // Matches "Article I", "ARTICLE 1", "Article IV: Membership"
        const articlePattern = /^Article\s+[IVX0-9]+/i;

        // Matches "Section 1", "Section 2.3", "Section 1:"
        const sectionPattern = /(Section\s+[0-9\.])[:\.]?(.+)/i;

        // Matches lists like "a.", "1.", "i)" (Optional, for finer detail)
        const listPattern = /^[a-z0-9]+\.|^[a-z0-9]+\)/i;

        // 3. Logic Tree
        if (!text) {
            // Handle empty lines (optional: return a spacer or null to filter out)
            return null;
            // return { tag: 'div', content: '', className: 'spacer' };
        }

        if (articlePattern.test(text)) {
            return {
                tag: 'h2',
                content: text,
                className: 'section-header article-title'
            };
        }

        if (sectionPattern.test(text)) {
            return {
                tag: 'div',
                content: `
                    <h3 class="section-title">${text.replace(sectionPattern, '$1')}</h3>
                    <p class="section-content">${text.replace(sectionPattern, '$2')}</p>
                `,
                className: 'section-container'
            };
        }

        if (listPattern.test(text)) {
            return {
                tag: 'div', // Using div for list items to avoid complex <ul> logic
                content: `<p class="section-content">${text}</p>`,
                className: 'section-container'
            };
        }

        // Default fallback: Standard Paragraph
        return {
            tag: 'div',
            content: `<p class="stray-content">${text}</p>`,
            className: 'section-container'
        };
    });
};

export { getImageUrl, parseConstitution };
