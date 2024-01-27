/**
 * Signals that a key could not be realized from the input.
 */
export default class BadKeyError extends Error {
    /**
     * @param {Error | string} messageOrCause
     */
    constructor(messageOrCause: Error | string);
    stack: string | undefined;
}
