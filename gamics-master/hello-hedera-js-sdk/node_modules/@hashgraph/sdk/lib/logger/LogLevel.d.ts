declare class LogLevel {
    /**
     * @param {string} level
     * @returns {LogLevel}
     */
    static _fromString(level: string): LogLevel;
    /**
     * @hideconstructor
     * @internal
     * @param {string} name
     */
    constructor(name: string);
    /** @readonly */
    readonly _name: string;
    /**
     * @returns {string}
     */
    toString(): string;
}
declare namespace LogLevel {
    let Silent: LogLevel;
    let Trace: LogLevel;
    let Debug: LogLevel;
    let Info: LogLevel;
    let Warn: LogLevel;
    let Error: LogLevel;
    let Fatal: LogLevel;
}
export default LogLevel;
