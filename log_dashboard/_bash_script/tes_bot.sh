#!/bin/bash
# Bot telegram
TOKEN_BOT="5933436321:AAENbKxFkF_1_CYAJSqit-N0o31sfVLLmrs"
CHAT_ID="-826718690"

PESAN="Halo dikirim dari server <b>$(hostname)</b>"
curl -s -X POST "https://api.telegram.org/bot$TOKEN_BOT/sendmessage" -d "chat_id=$CHAT_ID" -d "parse_mode=html" -d "text=$PESAN"