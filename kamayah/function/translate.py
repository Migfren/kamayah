import csv


class translation:

    def call(self):
            d = {}
            with open('translation.csv') as csvfile:
                reader = csv.reader(csvfile, delimiter=',')

                for row in reader:  # type(row) = <list>
                    d[(row[0])] = row[1]

            clean_dict = {key.strip('?,.ï»¿'): item.strip('?,.ï»¿') for key, item in d.items()}
            clean_dict = {k.lower(): v for k, v in clean_dict.items()}
            clean_dict


            #TEXT FROM TEXT BOX
            input = self.root.ids.transText.text
            input = str(input.lower())
            print(self.eng_tausug(input,clean_dict))
            self.root.ids.transText.text = self.eng_tausug(input,clean_dict)


    def eng_tausug(self,input,eng_tausug):
            for k, v in eng_tausug.items():
                input = input.replace(k, v)
            return input