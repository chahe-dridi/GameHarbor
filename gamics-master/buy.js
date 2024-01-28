const buyButton = document.querySelector("button");

buyButton.addEventListener("click", () => {
  // Perform actions when the button is clicked
  console.log("Button clicked!");
  async function handlePurchase(gameId) {
        const gamePrice = 1000; 
    if (getAccountBalance(myAccountId) >= gamePrice) {
        // Create the transfer transaction
        const sendHbar = await new TransferTransaction()
          .addHbarTransfer(myAccountId, Hbar.fromTinybars(-gamePrice))
          .addHbarTransfer(myAccountId, Hbar.fromTinybars(gamePrice))
          .execute(client);
    
          alert("Thank you for your purchase!");
      } else {
        alert("You can't purchase!");
      }
    }
  window.location.href = "gamics-master/index.html";
});