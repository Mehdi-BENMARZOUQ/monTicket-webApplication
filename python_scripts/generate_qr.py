import qrcode
import sys
import base64
from io import BytesIO

def generate_qr(data):
    try:
        qr = qrcode.QRCode(version=1, error_correction=qrcode.constants.ERROR_CORRECT_L, box_size=10, border=4)
        qr.add_data(data)
        qr.make(fit=True)

        img = qr.make_image(fill='black', back_color='white')
        buffer = BytesIO()
        img.save(buffer, format="PNG")
        img_str = base64.b64encode(buffer.getvalue()).decode("utf-8")

        return img_str
    except Exception as e:
        return str(e)

if __name__ == "__main__":
    if len(sys.argv) != 2:
        print("Usage: python generate_qr.py <data>")
        sys.exit(1)

    data = sys.argv[1]
    qr_code_base64 = generate_qr(data)
    print(qr_code_base64)
