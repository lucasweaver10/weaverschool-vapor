import tiktoken
import sys
import json

def count_tokens(text, token_limit=None):
    enc = tiktoken.get_encoding("cl100k_base")
    tokens = enc.encode(text)
    token_count = len(tokens)

    if token_limit is not None and token_count > token_limit:
        tokens = tokens[:token_limit]
        text = enc.decode(tokens)
    
    return {
        "token_count": token_count,
        "truncated_text": text
    }

if __name__ == "__main__":
    if len(sys.argv) < 2:
        print(json.dumps({"error": "Text input is required"}))
        sys.exit(1)

    # Read the text and token limit from the command line arguments
    text = sys.argv[1]
    token_limit = int(sys.argv[2]) if len(sys.argv) > 2 else None
    
    # Ensure the text is properly handled as UTF-8
    text = text.encode('utf-8').decode('utf-8')

    result = count_tokens(text, token_limit)
    print(json.dumps(result, ensure_ascii=False))