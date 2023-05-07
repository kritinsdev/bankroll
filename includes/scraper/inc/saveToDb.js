const { MongoClient } = require('mongodb');

const connectionString = 'mongodb://0.0.0.0:27017';

async function saveToDatabase(slotData) {
  const client = new MongoClient(connectionString, {
    useNewUrlParser: true,
    useUnifiedTopology: true
  });

  try {
    await client.connect();
    const db = client.db('slotsdb'); // Change 'slotsDatabase' to the desired database name
    const collection = db.collection('slots1'); // Change 'slots' to the desired collection name

    const result = await collection.insertOne(slotData);
    console.log(`${slotData.name} saved to MongoDB`);
  } catch (error) {
    console.error('Error while saving data to MongoDB:', error);
  } finally {
    await client.close();
  }
}

module.exports = { saveToDatabase };