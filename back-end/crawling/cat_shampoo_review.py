# -*- coding: utf-8 -*-

import requests
from bs4 import BeautifulSoup

url = 'http://www.catpre.com/shop/goods/goods_post.php?goodsno=9004'
response = requests.get(url)

soup = BeautifulSoup(response.content, 'html.parser', from_encoding='utf-8')

maximum = 0
page = 1
while 1:
	page_list = soup.findAll("a", {"class": "number"})
	if not page_list:
		maximum = page - 1
		break
	page = page + 1


idx = 0
for page_number in range(1, maximum + 1):
    pURL = url + '&amp;page=' + str(page_number)
    response = requests.get(pURL)
    soup = BeautifulSoup(response.content, 'html.parser', from_encoding='utf-8')
    writer_list = soup.findAll("span", {'class': {'name'}});
    esti_list = soup.findAll("span", {'class': {'ic-star'}});
    review_list = soup.findAll("p", {'class': {'comment comment-bg'}});
    for esti in esti_list:
        if(esti.get_text().strip() >= 4):
            print "장점|", writer_list[idx].get_text().strip(), "|", esti.get_text(
            ).strip(), "|", review_list[idx].get_text().strip()
            idx = idx + 1
         elif(esti.get_text().strip() < 3):
            print "단점|", writer_list[idx].get_text().strip(), "|", esti.get_text().strip(), "|", review_list[idx].get_text().strip()
            idx = idx+1
         else:
            print "기타|", writer_list[idx].get_text().strip(), "|", esti.get_text().strip(), "|", review_list[idx].get_text().strip()
            idx = idx+1
