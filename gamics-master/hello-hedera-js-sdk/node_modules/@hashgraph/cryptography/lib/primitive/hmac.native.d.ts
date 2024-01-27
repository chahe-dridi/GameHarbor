/**
 * @param {HashAlgorithm} algorithm
 * @param {Uint8Array | string} secretKey
 * @param {Uint8Array | string} data
 * @returns {Promise<Uint8Array>}
 */
export function hash(algorithm: HashAlgorithm, secretKey: Uint8Array | string, data: Uint8Array | string): Promise<Uint8Array>;
export type HashAlgorithm = string;
export namespace HashAlgorithm {
    let Sha256: string;
    let Sha384: string;
    let Sha512: string;
}
