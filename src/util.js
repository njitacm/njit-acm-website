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
    { eager: false, as: 'url' }
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
        const sectionPattern = /^Section\s+[0-9\.]+/i;

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
                className: 'text-2xl font-bold mt-6 mb-2 text-blue-800 uppercase'
            };
        }

        if (sectionPattern.test(text)) {
            return {
                tag: 'div',
                content: text.replace(/(Section\s+[0-9\.])[:\.]?(.+)/, '<h3>$1</h3><p>$2</p>'),
                className: 'text-xl font-semibold mt-4 mb-2 text-gray-700'
            };
        }

        if (listPattern.test(text)) {
            return {
                tag: 'div', // Using div for list items to avoid complex <ul> logic
                content: text,
                className: 'ml-6 pl-2 border-l-2 border-gray-300 italic mb-1'
            };
        }

        // Default fallback: Standard Paragraph
        return {
            tag: 'p',
            content: text,
            className: 'leading-relaxed text-gray-800 mb-2'
        };
    });
};

export { getImageUrl, parseConstitution };