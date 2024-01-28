const videoPlayer = document.getElementById("video-player");
const watchButton = document.getElementById("watch-button");
watchButton.addEventListener("click", handleVideoWatch);

async function handleVideoWatch() {
  
    const myAccountId = sessionStorage.getItem("account_id"); // Get account ID from session
    const agencyAccountId = "0.0.123456789"; // Replace with agency's account ID

    // Create a Hedera client instance (replace with your actual configuration)
    const client = Client.forTestnet(); // Assuming you're using the testnet

    

    // Perform the transaction to pay for watching the video:
    const sendHbar = await new TransferTransaction()
      .addHbarTransfer(myAccountId, Hbar.fromTinybars(1)) // Adjust amount as needed
      .addHbarTransfer(agencyAccountId, Hbar.fromTinybars(-1))
      .execute(client);

  
}