from django.shortcuts import render,HttpResponse
import requests
from django.http import JsonResponse
from django.views.decorators.csrf import csrf_exempt
from urllib.parse import parse_qs
import json 
# Create your views here.
def index(request):
    # url="http://localhost/wordpress/?action=store_data"
    url="http://localhost/wordpress/?action=login_data"
    # url = "http://localhost/wordpress/?action=product_data"


    response = requests.get(url)
    print(response.json())
    return HttpResponse("Hello The Api is working well")

def auth(request):
    return HttpResponse("Hello")

@csrf_exempt
def receive_order_details(request):
    order_details = request.body.decode('utf-8')
    print(order_details)
    return JsonResponse({'success': 'Django Server Recieved data successfully'})
   
def create_coupon(request):

    name = request.POST.get('name')
    amount = request.POST.get('amount')
    data = {"name" : name,"amount" : amount}
    print(data)
    
    return render(request,"index.html")