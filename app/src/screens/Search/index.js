import React, { useState, useEffect } from 'react';
import { TextInput, View, StyleSheet, SafeAreaView, ScrollView, FlatList } from 'react-native'
import Layout2 from '../../components/layout/Layout2';
import GLOBALS from '../../constants/GLOBALS';
import ListSearch from '../../components/list_search';
import productApi from '../../api/productApi';

const Search = () => {

    const [search, setSearch] = useState()
    const [listData, setListData] = useState()

    useEffect(() => {
        getData()
    }, [])

    const getData = async () => {
        try {
            const res = await productApi.getAllProduct()
            setListData(res)
        } catch (error) {
            console.log(error);
        }
    }

    const handleKeyDown = async () => {
        // call api here to search
        getData()
    }

    return (
        <Layout2 title={'Search'} showBack>
            <View style={styles.container}>
                <TextInput placeholder='Search'
                    onChangeText={(value) => setSearch(value)}
                    onSubmitEditing={handleKeyDown}
                    value={search}
                    placeholderTextColor={GLOBALS.COLOR.PrimaryText}
                    style={styles.textInput} />
            </View>
            <ListSearch listData={listData} />
        </Layout2>
    );
};

export default Search;

const styles = StyleSheet.create({
    container: {
        paddingHorizontal: 20,
        marginBottom: 20
    },

    textInput: {
        backgroundColor: GLOBALS.COLOR.PrimaryColor,
        borderRadius: 10,
        paddingVertical: 15,
        paddingHorizontal: 20,
        marginRight: 50,
        width: '100%',
        color: GLOBALS.COLOR.PrimaryText
    },
})