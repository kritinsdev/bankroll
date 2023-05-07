const express = require('express');
const dotenv = require('dotenv');
const cors = require('cors');
const MongoClient = require('mongodb').MongoClient;
const { ObjectId } = require('mongodb');

dotenv.config();

const app = express();
const port = process.env.PORT || 3000;

const uri = process.env.MONGODB_URI;
const client = new MongoClient(uri, { useNewUrlParser: true, useUnifiedTopology: true });

app.use(cors());
app.use(express.json());

app.get('/api/v1/slots', async (req, res) => {
    try {
        await client.connect();
        const collection = client.db('slotsdb').collection('slots1');

        const { id, name, provider } = req.query;
        const query = {};

        if (id) {
            query._id = new ObjectId(id);
        }
        if (name) {
            query.name = { $regex: new RegExp(name, 'i') };
        }
        if (provider) {
            query.providers = { $in: [new RegExp(provider, 'i')] };
        }

        const page = parseInt(req.query.page) || 1;
        const limit = parseInt(req.query.limit) || 10;
        const skip = (page - 1) * limit;

        const records = await collection.find(query).skip(skip).limit(limit).toArray();
        const totalRecords = await collection.countDocuments(query);

        res.json({
            data: records,
            page: page,
            totalPages: Math.ceil(totalRecords / limit),
            totalRecords: totalRecords
        });

    } catch (error) {
        console.error('Error:', error);
        res.status(500).json({ message: 'An error occurred while fetching data from MongoDB.' });
    } finally {
        await client.close();
    }
});

app.get('/api/v1/slots/import', async (req, res) => {
    try {
        await client.connect();
        const collection = client.db('slotsdb').collection('slots1');

        const ids = req.query.ids.split(',').map(id => new ObjectId(id));
        const query = { _id: { $in: ids } };

        const records = await collection.find(query).toArray();

        if (records.length > 0) {
            res.json(records);
        } else {
            res.status(404).json({ message: 'No slots found.' });
        }
    } catch (error) {
        console.error('Error:', error);
        res.status(500).json({ message: 'An error occurred while fetching data from MongoDB.' });
    } finally {
        await client.close();
    }
});


app.listen(port, () => {
    console.log(`Server is running on port ${port}`);
});
