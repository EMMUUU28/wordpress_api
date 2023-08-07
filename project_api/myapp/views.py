from django.shortcuts import render,HttpResponse
import requests

# Create your views here.
def index(request):
    url="http://localhost/wordpress/?action=store_data"
    
    response = requests.get(url)
    print(response.json())
    return HttpResponse("Hello")