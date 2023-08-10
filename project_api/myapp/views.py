from django.shortcuts import render,HttpResponse
import requests

# Create your views here.
def index(request):
    # url="http://localhost/wordpress/?action=store_data"
    url="http://localhost/wordpress/?action=login_data"
    response = requests.get(url)
    print(response.json())
    return HttpResponse("Hello The Api is working well")

def auth(request):
    return HttpResponse("Hello")