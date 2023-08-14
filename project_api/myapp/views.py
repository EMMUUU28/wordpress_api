from django.shortcuts import render,HttpResponse
import requests
from django.http import JsonResponse
from django.views.decorators.csrf import csrf_exempt
import json
# Create your views here.
def index(request):
    # url="http://localhost/wordpress/?action=store_data"
    url="http://localhost/wordpress/?action=login_data"
    # url="http://localhost/wordpress/?action=order_details"
    response = requests.get(url)
    print(response.json())
    return HttpResponse("Hello The Api is working well")

def auth(request):
    return HttpResponse("Hello")

@csrf_exempt
def receive_order_details(request):
    if request.method == 'POST':
        x=requests.get("http://127.0.0.1:8000/orders/")
        print(x.json())
        # Process the received data (e.g., save to a model, perform actions)
        # ...
        return JsonResponse(x.json())
    else:
        return JsonResponse({'error': 'Invalid request method'})    