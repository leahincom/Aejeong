from bs4 import BeautifulSoup
import requests

URL = 'http://www.catpre.com/shop/goods/goods_post.php?goodsno=23213'
response = requests.get(URL)
soup = BeautifulSoup(response.content, 'html.parser', from_encoding='utf-8')

page_list = soup.findAll("a", {"class": {'number'}})

iden = 0
for page_number in range(0, len(page_list)+1):
    URL = 'http://www.catpre.com/shop/goods/goods_post.php?goodsno=23213&page=' + str(page_number+1)
    response = requests.get(URL)
    soup = BeautifulSoup(response.content, 'html.parser', from_encoding='utf-8')
    date_list = soup.findAll("span", {"class": {"date"}})
    esti_list = soup.findAll("span", {'class': {'ic-star'}})
    review_list = soup.findAll("p", {'class': {'comment comment-bg'}})
    idx = 0
    for esti in esti_list:
        iden = iden+1
        score_string = esti.get_text().strip()
        score_string = score_string[:-1]
        score = float(score_string)
        if(score >= 4):
            print iden, "|하이포닉 워터리스 샴푸 고양이용 190ml |", date_list[idx].get_text().strip(), "|", score, "|", review_list[idx].get_text().strip()
            idx = idx+1
        elif(score < 3):
            print iden, "|하이포닉 워터리스 샴푸 고양이용 190ml |", date_list[idx].get_text().strip(), "|", score, "|", "|", review_list[idx].get_text().strip()
            idx = idx+1
        else:
            print iden, "|하이포닉 워터리스 샴푸 고양이용 190ml |", date_list[idx].get_text().strip(), "|", score, "|", "|", "|", review_list[idx].get_text().strip()
            idx = idx+1
