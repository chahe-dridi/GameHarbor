const fs = require('fs');
const { environmentSetup } = require('./function.js');

async function main() {
  try {
    const { newAccountId } = await environmentSetup();

    const data = {
      accountid: newAccountId
    };

    fs.writeFileSync('output.json', JSON.stringify(data));
    console.log('JSON file created successfully!');
  } catch (error) {
    console.error('Error:', error);
  }
}

main();
