export function adaptArticle(title) {
    const vowels = ["a", "e", "i", "o", "u", "y", "h"];
    const firstLetter = title.trim().toLowerCase()[0];
    return vowels.includes(firstLetter) ? "l'" : "la "
}
