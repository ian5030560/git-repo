# -*- coding: utf-8 -*-
"""start.ipynb

Automatically generated by Colaboratory.

Original file is located at
    https://colab.research.google.com/drive/1PksF11ya1IRDoqYOdzuPubGdkH8nadU-
"""

import pandas as pd

df = pd.read_csv("/content/edu_bigdata_imp1.csv", encoding = "big5", low_memory = False)

df_filtered = df[df["PseudoID"] == 39]
unique_values = df_filtered["dp001_review_sn"].unique()

print(len(unique_values))

from google.colab import drive
drive.mount('/content/drive')

import pandas as pd

df = pd.read_csv("/content/edu_bigdata_imp1.csv", encoding = "big5", low_memory = False)


student281 = df[df["PseudoID"] == 281]
for id in student281["dp001_video_item_sn"].unique():
  print("%d --> %s"%(id, student281[student281["dp001_video_item_sn"] == id]["dp001_indicator"].unique()[0]))

import pandas as pd

df = pd.read_csv("/content/edu_bigdata_imp1.csv", encoding = "big5", low_memory = False)

student281 = df[df["PseudoID"] == 281]
correct100 = student281[student281["dp001_prac_score_rate"] == 100]
print(len(correct100))

import pandas as pd

df = pd.read_csv("/content/edu_bigdata_imp1.csv", encoding = "big5", low_memory = False)

student71 = df[df["PseudoID"] == 71]
paused = student71[student71["dp001_record_plus_view_action"] == "paused"]
print(len(paused))

import pandas as pd

df = pd.read_csv("/content/edu_bigdata_imp1.csv", encoding = "big5", low_memory = False)

student71 = df[df["PseudoID"] == 71]
start = pd.to_datetime(student71["dp001_review_start_time"]).dt.strftime("%Y/%m/%d")
end = pd.to_datetime(student71["dp001_review_end_time"]).dt.strftime("%Y/%m/%d")
combine = pd.concat([start, end]).unique()
print(combine)

import pandas as pd

df = pd.read_csv("/content/edu_bigdata_imp1.csv", encoding = "big5", low_memory = False)

video_counts = df["dp001_review_sn"].value_counts()
print(int(video_counts.head(1).index.values[0]))

import pandas as pd

df = pd.read_csv("/content/edu_bigdata_imp1.csv", encoding = "big5", low_memory = False)

alignment = df["dp002_extensions_alignment"].dropna()
bools = alignment.str.contains('十二年國民基本教育類')
print(alignment[bools].count())

import pandas as pd

df = pd.read_csv("/content/edu_bigdata_imp1.csv", encoding = "big5", low_memory = False)

print(df["dp002_verb_display_zh_TW"].dropna().value_counts().head(3))

import pandas as pd

df = pd.read_csv("/content/edu_bigdata_imp1.csv", encoding = "big5", low_memory = False)

extensions = df["dp002_extensions_alignment"].dropna()

bools = extensions.str.contains('校園職業安全')
print(extensions[bools].count())

