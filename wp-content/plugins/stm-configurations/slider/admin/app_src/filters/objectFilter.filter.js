export const objectFilter = () => {
    return function (items, search) {
        let res = {};
        angular.forEach(items, function (value, key) {
            if (search !== value) {
                if (value.indexOf(search) !== -1 || value.toLowerCase().indexOf(search) !== -1) {
                    res[key] = value;
                }
            }
        });

        if (res.length < 0) {
            res = items;
        }

        return res;
    }
};