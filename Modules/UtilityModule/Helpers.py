class Helpers:

    @classmethod
    def get_element_by_key(cls, array, key, value):
        print(key, value)
        for element in array:
            print(element[key])
            if element[key] == value:
                return element
        else:
            return None

    @classmethod
    def get_element_index_by_key(cls, array, key, value):
        index = 0
        for element in array:
            if element[key] == value:
                return index
            index += 1
        else:
            return -1
