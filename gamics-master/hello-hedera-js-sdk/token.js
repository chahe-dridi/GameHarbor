// CREATE FUNGIBLE TOKEN (STABLECOIN)
let tokenCreateTx = await new TokenCreateTransaction()
	.setTokenName("GHC")
	.setTokenSymbol("GHC")
	.setTokenType(TokenType.FungibleCommon)
	.setDecimals(2)
	.setInitialSupply(10000)
	.setTreasuryAccountId(treasuryId)
	.setSupplyType(TokenSupplyType.Infinite)
	.setSupplyKey(supplyKey)
	.freezeWith(client);

//SIGN WITH TREASURY KEY
let tokenCreateSign = await tokenCreateTx.sign(treasuryKey);

//SUBMIT THE TRANSACTION
let tokenCreateSubmit = await tokenCreateSign.execute(client);

//GET THE TRANSACTION RECEIPT
let tokenCreateRx = await tokenCreateSubmit.getReceipt(client);

//GET THE TOKEN ID
let tokenId = tokenCreateRx.tokenId;

//LOG THE TOKEN ID TO THE CONSOLE
console.log(`- Created token with ID: ${tokenId} \n`);

// TOKEN ASSOCIATION WITH ALICE's ACCOUNT
let associateAliceTx = await new TokenAssociateTransaction()
	.setAccountId(aliceId)
	.setTokenIds([tokenId])
	.freezeWith(client)
	.sign(aliceKey);

//SUBMIT THE TRANSACTION
let associateAliceTxSubmit = await associateAliceTx.execute(client);

//GET THE RECEIPT OF THE TRANSACTION
let associateAliceRx = await associateAliceTxSubmit.getReceipt(client);

//LOG THE TRANSACTION STATUS
console.log(`- Token association with Alice's account: ${associateAliceRx.status} \n`);