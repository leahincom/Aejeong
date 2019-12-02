# -*- coding: utf-8 -*-

from bs4 import BeautifulSoup

url = 'http://www.catpre.com/shop/goods/goods_list.php?category=058004'
response = requests.get(url)

soup = BeautifulSoup(response.content, 'html.parser', from_encoding='utf-8')

product_list = soup.findAll("span", {'class': {'tit-prdc'}})

num = 1
for i in product_list:
    print num, i.text.strip()
    num = num + 1
