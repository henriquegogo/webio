# WEBIO
A messages REST server input/output

## How to use
#### Send message
POST with a 'message' data will create an entry.

#### Get messages
GET will get all messages array
```json
[
  {
    "timestamp": "<TIMESTAMP>",
    "message": "<MESSAGE_STRING>"
  }
]
```

## Channels
You can use different channels adding 'channel' attribute to query string
```
GET /?channel=mychannel
```

## License
MIT