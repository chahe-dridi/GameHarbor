declare class GrpcStatus {
    /**
     * @internal
     * @param {number} code
     * @returns {GrpcStatus}
     */
    static _fromValue(code: number): GrpcStatus;
    /**
     * @hideconstructor
     * @internal
     * @param {number} code
     */
    constructor(code: number);
    /** @readonly */
    readonly _code: number;
    /**
     * @returns {string}
     */
    toString(): string;
    /**
     * @returns {number}
     */
    valueOf(): number;
}
declare namespace GrpcStatus {
    let Ok: GrpcStatus;
    let Cancelled: GrpcStatus;
    let Unknown: GrpcStatus;
    let InvalidArgument: GrpcStatus;
    let DeadlineExceeded: GrpcStatus;
    let NotFound: GrpcStatus;
    let AlreadyExists: GrpcStatus;
    let PermissionDenied: GrpcStatus;
    let ResourceExhausted: GrpcStatus;
    let FailedPrecondition: GrpcStatus;
    let Aborted: GrpcStatus;
    let OutOfRange: GrpcStatus;
    let Unimplemented: GrpcStatus;
    let Internal: GrpcStatus;
    let Unavailable: GrpcStatus;
    let DataLoss: GrpcStatus;
    let Unauthenticated: GrpcStatus;
    let Timeout: GrpcStatus;
    let GrpcWeb: GrpcStatus;
}
export default GrpcStatus;
